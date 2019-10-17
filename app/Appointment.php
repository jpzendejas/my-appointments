<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $fillable = [
      'description',
      'specialty_id',
      'doctor_id',
      'patient_id',
      'scheduled_date',
      'scheduled_time',
      'type'
    ];
 // N a 1
    public function specialty(){
      return $this->belongsTo(Specialty::class);
    }

    // N $appointment->doctors 1
    public function doctor(){
      return $this->belongsTo(User::class);
    }

    // N $appointment->patients 1
    public function patient(){
      return $this->belongsTo(User::class);
    }
    // 1 - 1/0
    public function cancellation(){

      return $this->hasOne(CancelledAppointment::class);
    }

    //accesor

    public function getScheduledTime12Attribute(){
      return (new Carbon($this->scheduled_time))->format('g:i A');
    }

}
