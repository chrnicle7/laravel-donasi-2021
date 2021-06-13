<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'saran';
    protected $fillable = ['nama', 'email', 'no_hp', 'subyek', 'konten', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by', 'verified_at', 'verified_by'];
    public $timestamps = false;
}
