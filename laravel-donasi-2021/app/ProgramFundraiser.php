<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramFundraiser extends Model
{
    //
    protected $table = 'program_fundraiser';
    protected $fillable = ['id_program', 'id_user', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo('App\Program', 'id_program', 'id');
    }

    public function fundraiser()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
