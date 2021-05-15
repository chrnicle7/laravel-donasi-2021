<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $fillable = ['nama', 'id_provinsi', 'is_verified', 'inserted_at', 'inserted_by'];

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'id_provinsi', 'id');
    }

    public function kecamatans()
    {
        return $this->hasMany('App\Kecamatan', 'id_kabupaten', 'id');
    }

    public function relawans()
    {
        return $this->hasMany('App\Users', 'id_kab', 'id');
    }
}
