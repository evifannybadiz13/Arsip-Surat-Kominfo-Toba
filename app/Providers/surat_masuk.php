<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratmasuk extends Model
{
	protected $table= 'surat_masuk';
    protected $fillable= ['nomorsurat','pengirim','penerima','prihal','tglsurat','tglterima','namafile'];
}
