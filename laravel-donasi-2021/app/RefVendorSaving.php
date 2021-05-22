<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefVendorSaving extends Model
{
    protected $table = 'ref_vendor_saving';
    protected $fillable = ['nama', 'inserted_at', 'inserted_by', 'edited_at', 'edited_by'];
    public $timestamps = false;

    public function rekenings()
    {
        return $this->hasMany('App\Rekening', 'id_vendor', 'id');
    }
}
