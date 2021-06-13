<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontenBlog extends Model
{
    //
    protected $table = 'konten_blog';
    protected $fillable = ['id_user', 'judul', 'konten', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by', 'verified_at', 'verified_by'];
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
