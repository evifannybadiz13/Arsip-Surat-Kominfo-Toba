<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table='surat_masuks';
    protected $fillables = ['nomor_surat', 'tgl_surat','tgl_terima','pengirim','perihal','no_agenda'];
}
