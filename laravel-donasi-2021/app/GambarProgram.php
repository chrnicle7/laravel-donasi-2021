<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarProgram extends Model
{
    protected $table = 'gambar_program';
    protected $fillable = ['id_program', 'nama', 'ekstensi', 'ukuran', 'path'];
}
