<?php

namespace App\Models;

class Leaves extends \Eloquent {
    protected $table = 'Leaves';

    protected $dates=['leaveDate'];

    protected $fillable = [
        'regNo',
        'lType',
        'leaveDate',
        'description',
        'paper',
        'status',
    ];

    public function teacher(){

        return $this->belongsTo('App\Models\Teachers','regNo');
    }
}
