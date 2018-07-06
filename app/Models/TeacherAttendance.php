<?php

namespace App\Models;

class TeacherAttendance extends \Eloquent {
  protected $dates = ['date','created_at'];
  protected $table = 'TeacherAttendance';
  protected $fillable = [
      'regNo',
      'date',
//      'vEMPNO',
      'dIN_TIME',
      'dOUT_TIME',
      'nWorkingHOUR',
      'nLATE',
      'vSTATUS',
      'REMARKS',
      'vDEPT_NAME',
      'vSECTION_NAME',
      'vDES_NAME',
      'vSHIFT_CODE',
      'vWEEKLY_OFF',
      'created_at'
  ];
  public function teacher(){
      return $this->belongsTo('App\Models\Teachers','regNo');
  }
}
