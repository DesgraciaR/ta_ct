<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiburModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'liburnasional';
	protected $fillable = ['id,tanggal,ket_libur',];
	
}
