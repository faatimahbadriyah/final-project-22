<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public $timestamps = false;
    protected $table = "cast";
    protected $fillable = ["nama", "umur", "bio"];
}