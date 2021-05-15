<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Relawan extends Model
{
    protected $table = 'relawan';
    protected $fillable = ['id_user', 'nama_depan', 'nama_belakang', 
                            'alamat_ktp', 'no_wa', 'id_prov', 'id_kab', 
                            'id_kec', 'id_kel', 'id_profesi', 'id_jk',
                            'id_agama', 'remember_token', 'email',
                            'is_verified', 'inserted_at', 'edited_at', 
                            'edited_by'
                        ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function profesi()
    {
        return $this->belongsTo('App\RefProfesi', 'id_profesi', 'id');
    }

    public function agama()
    {
        return $this->belongsTo('App\RefAgama', 'id_agama', 'id');
    }
}
