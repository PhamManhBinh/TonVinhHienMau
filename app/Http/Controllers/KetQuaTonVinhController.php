<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExcelTonVinh;


class KetQuaTonVinhController extends Controller
{
    public function XemKetQua(Request $request){
        $id = $request->id;
        $max = $request->max;
        $tenDV = DB::select('SELECT TenDonVi FROM donvi WHERE Id='.$id)[0]->TenDonVi;

        $data = DB::select('SELECT DISTINCT *,exceltonvinh.Id as IdE FROM exceltonvinh,nguoihienmau WHERE MaDotTonVinh='.$id.' AND exceltonvinh.HoTen=nguoihienmau.HoTen AND exceltonvinh.NgaySinh=nguoihienmau.NgaySinh AND exceltonvinh.Nhom_ABO=nguoihienmau.Nhom_ABO');
        return view('KetQuaTonVinh')->with(['data'=>$data,'max'=>$max,'tenDV'=>$tenDV,'idTV'=>$id]);
    }
    public function XacNhan(Request $request){
        //lưu kết quả tôn vinh từ bảng exceltonvinh vào bảng người hiến máu
        //tham số đợt hiến máu
        $Id = $request->Id;
        $exceltonvinh = DB::table('exceltonvinh')->where('MaDotTonVinh',$Id)->get();
        $thoigianTV = DB::select('SELECT ThoiGian FROM tonvinh where Id='.$Id)[0]->ThoiGian;
        
        foreach($exceltonvinh as $item){
        
            DB::table('nguoihienmau')->where('HoTen',$item->HoTen)->where('NgaySinh',$item->NgaySinh)->where('Nhom_ABO',$item->Nhom_ABO)->update(['Muc_'.$item->MucTonVinh => $thoigianTV, 'Muc_'.$item->MucTonVinh.'_donvi' => $item->MaDonVi]);
            
        } 
        
        return response('200')->setStatusCode(200);
    }
    public function XuatExcel(Request $request){
        //xuất ra file excel
        //tham số đợt hiến máu
    }
}