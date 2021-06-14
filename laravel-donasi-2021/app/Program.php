<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $fillable = ['id_user', 'nama_program', 'info', 'target', 'batas_akhir', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function userProgram()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function gambarProgram()
    {
        return $this->hasOne('App\GambarProgram', 'id_program', 'id');
    }

    public function donaturs()
    {
        return $this->hasMany('App\ProgramDonatur', 'id_program', 'id');
    }

    public function fundraisers()
    {
        return $this->belongsToMany('App\User', 'program_fundraiser', 'id_program', 'id_user');
    }

    public function beritas()
    {
        return $this->hasMany('App\ProgramBerita', 'id_program', 'id');
    }
}
