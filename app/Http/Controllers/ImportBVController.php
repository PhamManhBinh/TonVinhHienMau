<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NguoiHienMau;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class ImportBVController extends Controller
{

    public function import(Request $request)
    {
        /*  status = 0 : lỗi không có file
            status = 1 : import thành công
            status = 2 : lỗi định dạng file
            status = 3 : lỗi cấu trúc file excel
        */

        //check xem người dùng có upload file lên không
        if(!$request->hasFile('myfile')){
            return view('ImportBenhVien')->with(['status'=> 0, 'message'=>'Bạn chưa chọn file!']);
        }

        //get file, định dạng file và đường dẫn
        $file = $request->file('myfile');
        $fileExtension = $file->getClientOriginalExtension();
        $filePath = $file->getRealPath();

        //check lỗi định dạng file
        if($fileExtension!="xlsx"){
            return view('ImportBenhVien')->with(['status'=> 2, 'message'=>'Định dạng file không đúng!']);
        }

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadSheet = $reader->load($filePath);
		$excelSheet = $spreadSheet->getActiveSheet();
        $highestRow = $excelSheet->getHighestRow(); // e.g. 10
		$highestColumn = $excelSheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
		$columnArray = $this->getColumnArray($highestRow,$highestColumnIndex,$excelSheet);

        if($columnArray == null){
            return view('ImportBenhVien')->with(['status'=> 3, 'message'=>'Lỗi cấu trúc file excel!']);
        }

        $countArray = array('update' => 0,'insert' => 0,'duplicate' => 0);

        $listDuplicate = $this->importDataBV($highestRow,$columnArray,$excelSheet,$countArray);
        return view('KetQuaImportBV')->with(['status'=> 1, 'count'=>$countArray,'listDuplicate'=>$listDuplicate]);
    }

    //hàm đọc cấu trúc file excel, trả về mảng các cột, trả về null nếu sai cấu trúc
    protected function getColumnArray($highestRow,$highestColumnIndex,$excelSheet){
        $columnArray = array();
		for ($row = 1; $row <= $highestRow; ++$row) {
			if(count($columnArray)>=10) break;

			for ($col = 1; $col <= $highestColumnIndex; ++$col) {
				$value = $excelSheet->getCellByColumnAndRow($col, $row)->getValue();
				$value = trim($value); // chuẩn hóa
				$value = str_replace("\n"," ",$value); // chuẩn hóa

				switch($value){
					case "STT":
					case "Họ tên":
					case "Ngày sinh":
					case "Nghề nghiệp":
					case "Nơi làm việc hiện tại":
					case "Số điện thoại":
					case "Địa chỉ thường trú":
					case "Số lần đã hiến":
					case "Nhóm ABO":
					case "Nhóm Rh(D)":
						array_push($columnArray,$col);
						break;
				}
			}
		}
        if(count($columnArray)==10)
            return $columnArray;
        return null;
    }

    //hàm thực hiện import dữ liệu, đồng thời trả về số lượng dòng update, thêm và trùng
    //nếu duplicate trả về danh sách người trùng
    protected function importDataBV($highestRow,$columnArray,$excelSheet,&$countArray){
        $stt=1;
        $model = new NguoiHienMau;
        $listDuplicate = array();

        for ($row = 1; $row <= $highestRow; ++$row) {
            $value = $excelSheet->getCellByColumnAndRow($columnArray[0], $row)->getValue();
            if($value!=$stt){ continue; }

            //đọc từng dòng
            $model->HoTen = $excelSheet->getCellByColumnAndRow($columnArray[1], $row)->getValue();
            $ngaySinh = $excelSheet->getCellByColumnAndRow($columnArray[2], $row)->getValue();
            $model->NgaySinh = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($ngaySinh);
            $model->NgheNghiep = $excelSheet->getCellByColumnAndRow($columnArray[3], $row)->getValue();
            $model->NoiLamViec = $excelSheet->getCellByColumnAndRow($columnArray[4], $row)->getValue();
            $model->SDT = $excelSheet->getCellByColumnAndRow($columnArray[5], $row)->getValue();
            $model->DiaChi = $excelSheet->getCellByColumnAndRow($columnArray[6], $row)->getValue();
            $model->SoLanHien = $excelSheet->getCellByColumnAndRow($columnArray[7], $row)->getValue();
            $model->Nhom_ABO = $excelSheet->getCellByColumnAndRow($columnArray[8], $row)->getValue();
            $model->Nhom_Rh = $excelSheet->getCellByColumnAndRow($columnArray[9], $row)->getValue();
            $stt += 1;

            //so khớp từng người trong database
            $listResult = DB::select('SELECT * FROM nguoihienmau WHERE HoTen="'.$model->HoTen.'" AND NgaySinh="'.$model->NgaySinh->format('Y-m-d').'" AND Nhom_ABO="'.$model->Nhom_ABO.'"');

            if($listResult!=null){

                //nếu đã tồn tại trong database thì cập nhật số lần hiến máu
                if(count($listResult)==1){
                    DB::update('UPDATE nguoihienmau SET SoLanHien=? WHERE Id=?',[$model->SoLanHien,$listResult[0]->Id]);
                    $countArray['update']++;
                }else{
                    // Nếu có nhiều người trong database trùng với người đang xét trong file excel
                    //(theo các tiêu chí trên) thì hiển thị danh sách các người này để cán bộ quyết định
                    $model->Id = DB::table('excelbenhvien')->insertGetId(
                        ['HoTen' => $model->HoTen, 'NgaySinh' => $model->NgaySinh->format('Y-m-d'), 'NgheNghiep' => $model->NgheNghiep,
                        'NoiLamViec' => $model->NoiLamViec, 'SDT' => $model->SDT, 'DiaChi' => $model->DiaChi,
                        'SoLanHien' => $model->SoLanHien, 'Nhom_ABO' => $model->Nhom_ABO, 'Nhom_Rh' => $model->Nhom_Rh,]
                    );

                    $tempArray = array();
                    array_push($tempArray,clone $model);
                    foreach($listResult as $result){
                        array_push($tempArray,clone $result);
                        $countArray['duplicate']++;
                    }
                    array_push($listDuplicate,$tempArray);
                }

            }
            else{
                //chưa tồn tại thì thêm vào database
                DB::insert('INSERT INTO nguoihienmau (HoTen,NgaySinh,NgheNghiep,NoiLamViec,SDT,DiaChi,SoLanHien,Nhom_ABO,Nhom_Rh)
                    VALUES ("'.$model->HoTen.'","'.$model->NgaySinh->format('Y-m-d').'","'.$model->NgheNghiep.'","'.$model->NoiLamViec.'","'.$model->SDT.'","'.$model->DiaChi.'",'.$model->SoLanHien.',"'.$model->Nhom_ABO.'","'.$model->Nhom_Rh.'")');
                $countArray['insert']++;
            }


        }
        return $listDuplicate;
    }
}
