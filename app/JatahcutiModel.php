<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JatahcutiModel extends Model
{


	use SoftDeletes;

	protected $dates =['deleted_at'];
    protected $primaryKey = 'id_jatah';
    protected $table = 'tbl_jatah_cuti';
	protected $fillable = ['tahun','jumlah_tahun_lalu','jumlah_tahun_ini','nip_baru','created_at','updated_at'];


	public function	user()
	{
			return $this->belongsTo('App\User','nip_baru');
	}
	
}
