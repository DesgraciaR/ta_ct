<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\PermohonanCuti;

class GlobalHelper{
	public static function accessdata($nip){
		$client = new Client(); //GuzzleHttp\Client
        $result = $client->get('http://localhost/wssimpeg/public/index.php/pns/'.$nip);
        $data = json_decode($result->getBody());
        return $data;
	}

	public static function notifikasi(){
		if(session()->get('user')->ppk == '1'){
			return PermohonanCuti::where('status','Diterima')->orWhere('status','Ditangguhkan')->get()->where('status_ppk',NULL)->count();
		}else{
			return PermohonanCuti::where('status',Null)->where('id_atasan',session()->get("data")->nip_baru)->where('status',Null)->count();
		}
		

	}

	public static function baca(){
		return PermohonanCuti::where('status','Diterima')->where('status_baca','0')->where('nip_baru',session()->get("data")->nip_baru)->get();
	}


}