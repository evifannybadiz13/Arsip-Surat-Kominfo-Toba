<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = ['id','nomor_surat','tanggal_surat','sifat','pengirim','perihal','ditujukan','isi'];
}
