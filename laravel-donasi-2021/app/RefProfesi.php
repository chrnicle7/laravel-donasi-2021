<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefProfesi extends Model
{
    protected $table = 'ref_profesi';
    protected $fillable = ['nama', 'is_active', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    
    public function relawans()
    {
        return $this->hasMany('App\Relawan', 'id_profesi', 'id');
    }
}
