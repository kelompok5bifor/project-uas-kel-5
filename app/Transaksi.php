<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'id_user', 'tanggal_order', 'tanggal_bayar', 'total_bayar', 'status'];

    public function mobil()
    {
    	return $this->belongsTo('App\Mobil');
    }
}
