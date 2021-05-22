<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekening';
    protected $fillable = ['id_vendor', 'nama_rekening', 'nomor_rekening', 
                            'is_active', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function vendor()
    {
        return $this->belongsTo('App\RefVendorSaving', 'id_vendor', 'id');
    }
}
