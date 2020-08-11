<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSurat extends Model
{
    protected $fillable = ['id','nomor_surat','lampiran','sifat','pengirim','perihal','penerima','isi'];
}
