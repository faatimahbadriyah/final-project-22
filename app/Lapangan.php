<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangan';
    protected $fillable = ['name'];

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
}