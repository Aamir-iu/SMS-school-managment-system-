<?php

namespace App\Models;

class Student extends \Eloquent
{
    protected $table = 'Student';
    protected $fillable = ['regiNo',
    'regDAte',
    'firstName',
    'lastName',
    'middleName',
    'gender',
    'religion',
    'bloodgroup',
    'nationality',
    'dob',
    'session',
    'class',
    'photo',
    'fatherName',
    'fatherCellNo',
    'motherName',
    'motherCellNo',
    'presentAddress',
    'guardianCNIC',
    'parmanentAddress',
    'email_address',
    'fourthSubject',
    'cphsSubject'
    ];
    protected $primaryKey = 'id';
    public function attendance()
    {
        $this->primaryKey = "regiNo";
        return $this->hasMany('App\Models\Attendance', 'regiNo');
    }
    

}
