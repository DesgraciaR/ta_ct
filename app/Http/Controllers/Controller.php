<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\PermohonanCuti;

use App\JatahcutiModel;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function cektahun(){
        $jumlah_cuti=JatahcutiModel::where('nip_baru',session()->get('user')->nip_baru)->first();

$datapermohonan = PermohonanCuti::where('nip_baru',session()->get('user')->nip_baru)->where('status','Ditangguhkan')->whereYear('tgl_mulai',$jumlah_cuti->tahun)->get();

$jml_ditangguhkan=0;
  if(count($datapermohonan) > 0){
    foreach ($datapermohonan as $key => $value) {
      $jml_ditangguhkan+=$value->jumlah_cuti;
    }

  }

if(date('Y') != $jumlah_cuti->tahun){
    $jumlah_cuti->tahun = date('Y');
    if($jumlah_cuti->jumlah_tahun_ini>=6){
      $jml_ditangguhkan+=6;
    }else{
      $jml_ditangguhkan+=$jumlah_cuti->jumlah_tahun_ini;
    }

    $jumlah_cuti->jumlah_tahun_lalu = $jml_ditangguhkan;
    $jumlah_cuti->jumlah_tahun_ini = 12;
    $jumlah_cuti->save();
}
    }
}
