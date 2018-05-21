<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
* 
*/
class JenisCuti extends Model
{
	protected $table = 'tbl_jenis_cuti';

	public function PermohonanCuti()
	{
		return $this->hasMany('App/PermohonancutiModel');
	}


}

?>