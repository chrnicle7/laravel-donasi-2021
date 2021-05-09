<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $fillable = ['nama', 'id_provinsi', 'is_verified', 'inserted_at', 'inserted_by'];
}
