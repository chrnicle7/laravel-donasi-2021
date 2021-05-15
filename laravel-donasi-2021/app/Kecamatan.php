<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['nama', 'id_kabupaten', 'is_verified', 'inserted_at', 'inserted_by'];

    public function kabupaten()
    {
        return $this->belongsTo('App\Kabupaten', 'id_kabupaten', 'id');
    }

    public function kelurahans()
    {
        return $this->hasMany('App\Kelurahan', 'id_kecamatan', 'id');
    }

    public function relawans()
    {
        return $this->hasMany('App\Users', 'id_kec', 'id');
    }
}
