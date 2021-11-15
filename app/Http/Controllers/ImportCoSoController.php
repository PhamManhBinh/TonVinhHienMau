<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonVi;
use App\Models\ExcelTonVinh;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use DateTime;
Use Exception;

class ImportCoSoController extends Controller
{
    private $MaDonVi;
    private $TenFile;

    public function getView(Request $request)
    {
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }

        $listDonVi = DB::table("donvi")->get();
        return view('ImportCoSo')->with('list',$listDonVi);
    }

    public function importCoSo(Request $request){
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }


        //check xem người dùng có upload file lên không
        if(!$request->hasFile('myFile')){
            return back()->with('message','Bạn chưa chọn file!');
        }

        //get file, định dạng file và đường dẫn
        $file = $request->file('myFile');
        $fileExtension = $file->getClientOriginalExtension();
        $filePath = $file->getRealPath();

        //tên file và mã đơn vị
        $this->TenFile = $file->getClientOriginalName();
        $this->MaDonVi = $request->input('Id');

        //check lỗi định dạng file
        if($fileExtension == "xlsx"){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }elseif($fileExtension =="xls"){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            return back()->with('message','Định dạng file không đúng!');
        }

		$spreadSheet = $reader->load($filePath);
		$excelSheet = $spreadSheet->getActiveSheet();
        $highestRow = $excelSheet->getHighestRow(); // e.g. 10
		$highestColumn = $excelSheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
        $columnArray = $this->GetColumnArray($highestRow,$highestColumnIndex,$excelSheet);

        //lỗi cấu trúc file excel không đúng với CSDL
        if($columnArray == null){
            return back()->with('message','Lỗi cấu trúc file excel!');;
        }
        

        $data = $this->DocFileExcel($highestRow,$columnArray,$excelSheet);
        
        $dataView = $this->XuLy($data);

        return view('KiemDuyetTonVinh')->with(['data'=>$dataView]);
    }

    protected function DocFileExcel($highestRow,$columnArray,$excelSheet){
        $stt=1;
        $list = array();

        for ($row = 1; $row <= $highestRow; ++$row) {
            $value = $excelSheet->getCellByColumnAndRow($columnArray[0], $row)->getValue();
            
            if($value!== $stt){ continue; }
            //đọc từng dòng
            $model = new ExcelTonVinh;
            $model = $this->ReadRow($excelSheet,$row,$columnArray);
            $stt += 1;          
            array_push($list,$model);
        }
        return $list;
    }

    protected function XuLy($list){
        $listDuplicate = array();

        foreach($list as $model){

            //so khớp từng người trong database
            $listResult = DB::select('SELECT * FROM nguoihienmau WHERE HoTen="'.$model->HoTen.'" AND NgaySinh="'.$model->NgaySinh->format('Y-m-d').'" AND Nhom_ABO="'.$model->Nhom_ABO.'" AND Xoa=0');

            
                $tempArray = array();
                array_push($tempArray,clone $model);
                if($listResult!=null){
                    foreach($listResult as $result){
                        array_push($tempArray,clone $result);
                    }
                }
                array_push($listDuplicate,$tempArray);
            
        }

        return $listDuplicate;
    }

    //hàm đọc cấu trúc file excel, trả về mảng các cột, trả về null nếu sai cấu trúc
    protected function GetColumnArray($highestRow,$highestColumnIndex,$excelSheet){
        $columnArray = array();
		for ($row = 1; $row <= $highestRow; ++$row) {
			if(count($columnArray)>=10) break;

			for ($col = 1; $col <= $highestColumnIndex; ++$col) {
				$value = $excelSheet->getCellByColumnAndRow($col, $row)->getValue();
				$value = trim($value); // chuẩn hóa
				$value = str_replace("\n"," ",$value); // chuẩn hóa

				switch($value){
					case "STT":
					case "Họ và tên":
					case "Ngày sinh":
					case "Tháng sinh":
					case "Năm sinh":
					case "Nhóm máu ABO":
                    case "Nghề nghiệp":
					case "Địa chỉ":
					case "5 lần":
					case "10 lần":
					case "15 lần":
                    case "20 lần":
                    case "30 lần":
                    case "40 lần":
                    case "50 lần":
                    case "60 lần":
                    case "70 lần":
                    case "80 lần":
                    case "90 lần":
                    case "100 lần":
						array_push($columnArray,$col);
						break;
				}
			}
		}
        
        if(count($columnArray)>11)
            return $columnArray;
        return null;
        
    }

    protected function ReadRow($excelSheet,$row,$columnArray){
        $model = new ExcelTonVinh;
        $model->HoTen = $excelSheet->getCellByColumnAndRow($columnArray[1], $row)->getValue();
        $ngaySinh = $excelSheet->getCellByColumnAndRow($columnArray[2], $row)->getValue();
        $thangSinh = $excelSheet->getCellByColumnAndRow($columnArray[3], $row)->getValue();
        $namSinh = $excelSheet->getCellByColumnAndRow($columnArray[4], $row)->getValue();

        $model->NgaySinh = DateTime::createFromFormat('d/m/Y', $ngaySinh."/".$thangSinh."/".$namSinh);

        $model->Nhom_ABO = $excelSheet->getCellByColumnAndRow($columnArray[5], $row)->getValue();
        $model->NgheNghiep = $excelSheet->getCellByColumnAndRow($columnArray[6], $row)->getValue();
        $model->DiaChi = $excelSheet->getCellByColumnAndRow($columnArray[7], $row)->getValue();

        $mucTonVinh = null; $i=8;
        while($mucTonVinh == null){
            if($i >= count($columnArray)){  break;  }
            $mucTonVinh = $excelSheet->getCellByColumnAndRow($columnArray[$i], $row)->getValue();
            $i++;
        }

        $model->MucTonVinh = $mucTonVinh;
        $model->MaDonVi = $this->MaDonVi;
        $model->TenFile = $this->TenFile;
        return $model;
    }

    
}
