<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExcelBenhVien;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class ImportBVController extends Controller
{
    public function index()
    {
        return view('importBenhVien');
    }

    public function import(Request $request)
    {
        /*  status = 0 : lỗi không có file
            status = 1 : import thành công
            status = 2 : lỗi định dạng file
            status = 3 : lỗi cấu trúc file excel
        */

        //check xem người dùng có upload file lên không
        if(!$request->hasFile('myfile')){
            return view('importBenhVien')->with(['status'=> 0, 'message'=>'Bạn chưa chọn file!']);
        }

        //get file, định dạng file và đường dẫn
        $file = $request->file('myfile');
        $fileExtension = $file->getClientOriginalExtension();
        $filePath = $file->getRealPath();

        //check lỗi định dạng file
        if($fileExtension!="xlsx"){
            return view('importBenhVien')->with(['status'=> 2, 'message'=>'Định dạng file không đúng!']);
        }

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadSheet = $reader->load($filePath);
		$excelSheet = $spreadSheet->getActiveSheet();
        $highestRow = $excelSheet->getHighestRow(); // e.g. 10
		$highestColumn = $excelSheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
		$columnArray = $this->getColumnArray($highestRow,$highestColumnIndex,$excelSheet);

        if($columnArray == null){
            return view('importBenhVien')->with(['status'=> 3, 'message'=>'Lỗi cấu trúc file excel!']);
        }

        $countArray = array('update' => 0,'insert' => 0,'duplicate' => 0);

        //hàm thực hiện import dữ liệu, đồng thời trả về số lượng dòng update, thêm và trùng
        $this->importDataBV($highestRow,$columnArray,$excelSheet,$countArray);

        return view('importBenhVien')->with(['status'=> 1, 'count'=>$countArray]);
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

    protected function importDataBV($highestRow,$columnArray,$excelSheet,&$countArray){
        $stt=1;
        $model = new ExcelBenhVien;
        $modelTemp = new ExcelBenhVien;
        for ($row = 1; $row <= $highestRow; ++$row) {
            $value = $excelSheet->getCellByColumnAndRow($columnArray[0], $row)->getValue();
            if($value!=$stt){ continue; }

            $model->hoTen = $excelSheet->getCellByColumnAndRow($columnArray[1], $row)->getValue();
            $ngaySinh = $excelSheet->getCellByColumnAndRow($columnArray[2], $row)->getValue();
            $model->ngaySinh = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($ngaySinh);
            $model->ngheNghiep = $excelSheet->getCellByColumnAndRow($columnArray[3], $row)->getValue();
            $model->noiLamViec = $excelSheet->getCellByColumnAndRow($columnArray[4], $row)->getValue();
            $model->sdt = $excelSheet->getCellByColumnAndRow($columnArray[5], $row)->getValue();
            $model->diaChi = $excelSheet->getCellByColumnAndRow($columnArray[6], $row)->getValue();
            $model->soLanHien = $excelSheet->getCellByColumnAndRow($columnArray[7], $row)->getValue();
            $model->nhomABO = $excelSheet->getCellByColumnAndRow($columnArray[8], $row)->getValue();
            $model->nhomRh = $excelSheet->getCellByColumnAndRow($columnArray[9], $row)->getValue();
            $stt += 1;

            //so khớp từng người trong database
            $modelTemp = DB::select('SELECT * FROM excelbenhvien WHERE HoTen="'.$model->hoTen.'" AND NgaySinh="'.$model->ngaySinh->format('Y-m-d').'" AND Nhom_ABO="'.$model->nhomABO.'"');


            if($modelTemp!=null){

                //nếu đã tồn tại trong database thì cập nhật số lần hiến máu
                if(count($modelTemp)==1 && $model->soLanHien > $modelTemp[0]->SoLanHien){
                    DB::update('UPDATE excelbenhvien SET SoLanHien=? WHERE Id=?',[$model->soLanHien,$modelTemp[0]->Id]);
                    $countArray['update']++;
                }else{
                    // Nếu có nhiều người trong database trùng với người đang xét trong file excel
                    //(theo các tiêu chí trên) thì hiển thị danh sách các người này để cán bộ quyết định
                }

            }
            else{
                //chưa tồn tại thì thêm vào database
                DB::insert('INSERT INTO excelbenhvien (HoTen,NgaySinh,NgheNghiep,NoiLamViec,SDT,DiaChi,SoLanHien,Nhom_ABO,Nhom_Rh)
                    VALUES ("'.$model->hoTen.'","'.$model->ngaySinh->format('Y-m-d').'","'.$model->ngheNghiep.'","'.$model->noiLamViec.'","'.$model->sdt.'","'.$model->diaChi.'",'.$model->soLanHien.',"'.$model->nhomABO.'","'.$model->nhomRh.'")');
                $countArray['insert']++;
            }


            //$db = new db();
            //$insert = $db->query();

        }
    }
}
