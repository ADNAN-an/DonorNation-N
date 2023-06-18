<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Donner extends Model
{

    protected $guarded = [];

     // method for relashion between donner and user
     public function user(){
        return $this->belongsTo(User::class);
    }

}
