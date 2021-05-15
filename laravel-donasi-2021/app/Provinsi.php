<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = ['nama', 'is_verified', 'inserted_at', 'inserted_by'];

    public function kabupatens()
    {
        return $this->hasMany('App\Kabupaten', 'id_provinsi', 'id');
    }

    public function relawans()
    {
        return $this->hasMany('App\Users', 'id_prov', 'id');
    }
}
