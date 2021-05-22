<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefAgama extends Model
{
    protected $table = 'ref_agama';
    protected $fillable = ['nama', 'is_active', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function relawans()
    {
        return $this->hasMany('App\Relawan', 'id_agama', 'id');
    }
}
