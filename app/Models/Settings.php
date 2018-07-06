<?php

namespace App\Models;

class Settings extends \Eloquent {

    protected $table = 'users';
    protected $fillable = ['firstname','lastname','login','email','address','password'];
}