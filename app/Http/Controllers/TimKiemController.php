<?php

namespace App\Http\Controllers;

use App\Models\NguoiHienMau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use phpDocumentor\Reflection\Location;

class TimKiemController extends Controller
{
  public function index()
  {
    $nguoihienmau = DB::select('SELECT * FROM nguoihienmau');
    return view('TimKiemTonVinh', compact('nguoihienmau'));
  }
  public function search(Request $request)
  {
    $chuoilon = explode('-','0-100');
    if(isset($request->solanhienmau)){
      $chuoilon = explode('-',$request->solanhienmau);
    }
    $nguoihienmau = DB::table('nguoihienmau')
    ->where('HoTen','LIKE','%'.$request->name.'%')
    ->where('DiaChi','LIKE','%'.$request->diachi.'%')
    ->where('Nhom_ABO','LIKE',$request->nhommau)
    ->whereBetween('SoLanHien',[(int)$chuoilon[0],(int)$chuoilon[1]])
    ->get();
    return view('TimKiemTonVinh', compact('nguoihienmau'));
  }
}
