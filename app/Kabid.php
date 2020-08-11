<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabid extends Model
{
    protected $table ='kabids';
    protected $fillable = ['nama','email','bidang','user_id','NIP'];
}
