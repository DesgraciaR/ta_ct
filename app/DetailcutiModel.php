<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailcutiModel extends Model
{
    protected $table = 'tbl_permohonan_cuti';
	protected $fillable = ['nama','nip_baru','tgl_pengajuan','tgl_mulai','tgl_selesai','alamat_cuti','notelepon'];
	
	public function jeniscuti()
	{
		return $this->belongsTo('App/JenisCuti','id_jenis_cuti','id_jenis_cuti');
	}

}
