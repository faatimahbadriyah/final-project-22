<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['jam', 'harga', 'lapangan_id', 'status'];
}
