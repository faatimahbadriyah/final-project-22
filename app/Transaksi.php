<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['nama_tim', 'durasi', 'total_bayar', 'status', 'file_bayar', 'user_id', 'jadwal_id'];
    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }
}