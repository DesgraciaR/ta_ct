<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JatahcutiModel extends Model
{
    protected $primaryKey = 'id_jatah';
    protected $table = 'tbl_jatah_cuti';
	protected $fillable = ['tahun','jumlah_tahun_lalu','jumlah_tahun_ini','nip_baru','created_at','updated_at'];
	
}
