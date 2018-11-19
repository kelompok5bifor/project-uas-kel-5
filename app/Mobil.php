<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = "mobil";
    protected $fillable = ['kode_mobil', 'merk_mobil', 'plat_nomor', 'harga_sewa'];

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
