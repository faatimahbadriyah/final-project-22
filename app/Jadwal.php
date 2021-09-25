<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['jam', 'harga', 'lapangan_id', 'status'];
    public function lapangan()
    {
        return $this->belongsTo('App\Lapangan');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}