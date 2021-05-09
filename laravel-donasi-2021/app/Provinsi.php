<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = ['nama', 'is_verified', 'inserted_at', 'inserted_by'];
}
