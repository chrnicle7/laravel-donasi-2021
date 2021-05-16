<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefProfesi extends Model
{
    protected $table = 'ref_profesi';
    protected $fillable = ['nama', 'is_active', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;
    
    public function relawans()
    {
        return $this->hasMany('App\Relawan', 'id_profesi', 'id');
    }

    public function insertedBy()
    {
        return $this->belongsTo('App\User', 'inserted_by', 'id');
    }

    public function editedBy()
    {
        return $this->belongsTo('App\User', 'edited_by', 'id');
    }
}
