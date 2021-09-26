<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // protected $table = "postingan"; 
    // jika seandainya table yang terhubung tidak auto-sync karena bahasa Indo

    protected $table = "profiles";
    // protected $fillable = ["title", "body", "user_id"]; // whitelist
    protected $guarded = []; //blacklist

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
