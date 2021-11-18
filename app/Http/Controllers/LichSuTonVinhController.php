<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TonVinh;
Use Exception;

class LichSuTonVinhController extends Controller
{
    public function TaoMoiTonVinh(Request $request){
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }

        $dsTonVinh = DB::select("select Id,MONTH(ThoiGian) as month,YEAR(ThoiGian) as year from tonvinh");
        return view('TaoMoiTonVinh')->with('list',$dsTonVinh);
    }

    public function TaoMoiTonVinhPost(Request $request){
        if(!$request->session()->has('username')){
            return redirect('/Login');
        }
        $request->validate([
            'thoi-gian' => 'required|date_format:Y-m',
        ]);

        $time = $request->input('thoi-gian');

        $tonvinh = new TonVinh();
        $tonvinh->ThoiGian = $time."-01";
        $tonvinh->save();

        return back();

    }

    public function XoaDotTonVinh(Request $request){
        $id = $request->input('id');
        TonVinh::find($id)->delete();
        return back();
    }

    public function XemKetQua(Request $request){
        return view('XemKetQuaTonVinh');
    }
    
}
