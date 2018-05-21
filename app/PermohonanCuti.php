<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanCuti extends Model
{
	protected $primaryKey = 'id_permohonan_cuti';
    protected $table = 'tbl_permohonan_cuti';
	protected $fillable = ['tgl_pengajuan','tgl_mulai','tgl_selesai','alamat_cuti','notelepon','alasan_cuti','status'];
	
	public function jeniscuti()
	{
		return $this->belongsTo('App\JenisCuti','id_jenis_cuti','id_jenis_cuti');
	}

	public function	user()
	{
			return $this->belongsTo('App\User','nip_baru');
	}

}
