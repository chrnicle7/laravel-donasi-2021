<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['nama', 'id_kecamatan', 'is_verified', 'inserted_at', 'inserted_by'];
}
