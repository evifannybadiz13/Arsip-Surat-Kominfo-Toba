<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    //
    protected $table ='disposisis';
    protected $fillable=['surat_masuk_id','nomor_surat','tgl_surat','pengirim','tgl_terima','nomor_agenda','perihal'];


}
