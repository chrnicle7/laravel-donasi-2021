<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['nama', 'id_kabupaten', 'is_verified', 'inserted_at', 'inserted_by'];
}
