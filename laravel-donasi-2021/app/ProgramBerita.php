<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramBerita extends Model
{
    protected $table = 'program_berita';
    protected $fillable = ['id_program', 'judul', 'konten_berita', 'is_active', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo('App\Program', 'id_program', 'id');
    }
}
