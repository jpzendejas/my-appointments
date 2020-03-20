<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Appointment;
use Carbon\Carbon;


class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fcm:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mensajes vìa FCM';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->info('Buscando citas mèdicas confirmadas en las pròximas 24 horas.');
        $now = Carbon::now();

        $appointmentsTomorrow = $this->getAppointments24Hours($now);

        foreach($appointmentsTomorrow as $appointment){
            $appointment->patient->sendFCM('No olvides tu cita mañana a esta hora');
            $this->info('Mensaje enviado 24 horas antes al paciente(ID) ' . $appointment->patient_id );


          }

          $appointmentsNextHour = $this->getAppointmentsNextHour($now);

            foreach($appointmentsNextsHour as $appointment){
              $appointment->patient->sendFCM('Tienes una cita en 1 hora. Te esperamos');
              $this->info('Mensaje enviado 1 hora antes al paciente(ID) ' . $appointment->patient_id );

            }



    }

    private function getAppointments24Hours($now){

    return Appointment::where('status','Confirmada')
        ->where('scheduled_date', $now->addDay()->toDateString())
        ->where('scheduled_time','>=',$now->copy()->subMinutes(3)->toTimeString())
        ->where('scheduled_time','<',$now->copy()->addMinutes(2)->toTimeString())
        ->get(['id','scheduled_date','scheduled_time','patient_id'])->toArray();
    }

    private function getAppointmentsNextHour($now){
      return Appointment::where('status','Confirmada')
          ->where('scheduled_date', $now->addHour()->toDateString())
          ->where('scheduled_time','>=',$now->copy()->subMinutes(3)->toTimeString())
          ->where('scheduled_time','<',$now->copy()->addMinutes(2)->toTimeString())
          ->get(['id','scheduled_date','scheduled_time','patient_id'])->toArray();
      }

}
