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
        
        $listDuplicate = array();
        $listWarning = array();
        $this->XuLy($data,$listDuplicate,$listWarning);

        //dd($dataView);
        return view('KiemDuyetTonVinh')->with(['data'=>$listDuplicate,'dataWarning'=>$listWarning]);
    }

    protected function XuLy($list,&$listDuplicate,&$listWarning){
        

        foreach($list as $model){

            //cập nhật số lần hiến máu từ đơn vị
            $listResult = DB::select('UPDATE nguoihienmau SET SoLanHien='.$model->SoLanHien.' WHERE HoTen="'.$model->HoTen.'" AND NgaySinh="'.$model->NgaySinh->format('Y-m-d').'" AND Nhom_ABO="'.$model->Nhom_ABO.'" AND Xoa=0');

            //so khớp từng người trong database
            $listResult = DB::select('SELECT * FROM nguoihienmau WHERE HoTen="'.$model->HoTen.'" AND NgaySinh="'.$model->NgaySinh->format('Y-m-d').'" AND Nhom_ABO="'.$model->Nhom_ABO.'" AND Xoa=0');

            
            if($listResult == null){
                $model->save();
                array_push($listWarning,clone $model);

            }else{
                $tempArray = array();
                array_push($tempArray,clone $model);
                foreach($listResult as $result){
                    $this->setFlag($result,$model->MucTonVinh);
                    $model->save();
                    array_push($tempArray,clone $result);
                }
                array_push($listDuplicate,$tempArray);
            }
            
        }

    }


    public function MucTonVinh($column){
        if($column<=8){
            return 5;
        }elseif($column<=11){
            return $this->MucTonVinh($column-1)+5;
        }else{
            return $this->MucTonVinh($column-1)+10;
        }
    }

    public function setFlag(&$model,$mucTonVinh){
        $checkTV = $this->TonVinhHopLe($model,$mucTonVinh);

        if( ($this->DaTonVinh($model,$mucTonVinh)) || ($model->SoLanHien < $mucTonVinh) ){
            $model->MucTonVinh = $mucTonVinh;
            $model->flag = "red";
            return;
        }
        if( ($model->SoLanHien >= $mucTonVinh) && ($checkTV == 1) ){
            $model->MucTonVinh=$mucTonVinh;
            $model->flag = "green";
        //    $this->setMucTonVinh($model,$mucTonVinh);
            return;
        }
        if( ($model->SoLanHien >= $mucTonVinh) && ($checkTV != 1) ){
            $model->MucTonVinh=$mucTonVinh;
            $model->flag = "yellow";
        //    $this->setMucTonVinh($model,$checkTV);
            return;
        }
        
    }

    //hàm kiểm tra xem người này đã được tôn vinh mức x hay chưa
    public function DaTonVinh($model,$mucTonVinh){
        switch($mucTonVinh){
            case 5:
                $Temp = $model->Muc_5;
                break;
            case 10:
                $Temp = $model->Muc_10;
                break;
            case 15:
                $Temp = $model->Muc_15;
                break;
            case 20:
                $Temp = $model->Muc_20;
                break;
            case 30:
                $Temp = $model->Muc_30;
                break;
            case 40:
                $Temp = $model->Muc_40;
                break;
            case 50:
                $Temp = $model->Muc_50;
                break;
            case 60:
                $Temp = $model->Muc_60;
                break;
            case 70:
                $Temp = $model->Muc_70;
                break;
            case 80:
                $Temp = $model->Muc_80;
                break;
            case 90:
                $Temp = $model->Muc_90;
                break;
            case 100:
                $Temp = $model->Muc_100;
                break;
        }
        if($Temp == null)
            return false;
        return true;
    }

    //hàm kiểm tra xem người này đã được tôn vinh các mức nhỏ hơn mức x đề xuất chưa
    //trả về mức tôn vinh đề xuất, trả về 1 nếu mức tôn vinh này hợp lệ
    public function TonVinhHopLe($model,$mucTonVinh){
        $arr = array(5,10,15,20,30,40,50,60,70,80,90,100); //mảng các mức tôn vinh

        //kiểm tra các mức nhỏ hơn được tôn vinh hay chưa, nếu chưa thì đề xuất tôn vinh mức nhỏ hơn
        for($i = 0; $i < array_search($mucTonVinh,$arr); $i++){
            if($this->DaTonVinh($model,$arr[$i]) == false){
                return $arr[$i];
            }
        }
        return 1;
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

    //hàm đọc 1 dòng file excel
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

        $SoLanHien = null; $i=8;
        while($SoLanHien == null){
            if($i >= count($columnArray)){  break;  }
            $SoLanHien = $excelSheet->getCellByColumnAndRow($columnArray[$i], $row)->getValue();
            $i++;
        }

        $model->SoLanHien = $SoLanHien;
        $model->MucTonVinh = $this->MucTonVinh($i-1);
        $model->MaDonVi = $this->MaDonVi;
        $model->TenFile = $this->TenFile;
        return $model;
    }

    public function ApiEditMucTV(Request $request){
        if(!isset($request['Id']) || !isset($request['MucTV'])){
            return response('404')->setStatusCode(404);
        }

        $id = $request['Id'];
        $mucTonVinh = $request['MucTV'];

        $status = DB::update('UPDATE nguoihienmau SET Muc_'.$mucTonVinh.'=? WHERE Id=? AND Muc_'.$mucTonVinh.' IS NULL',[date("Y-m-d"),$id]);
        
        if($status>0){
            return response('200')->setStatusCode(200);
        }
        return response('404')->setStatusCode(404);
    }

    
}
