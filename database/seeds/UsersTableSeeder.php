<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name' => 'Pablo Flores',
          'email' => 'jp.floreszendejas@ugto.mx',
          'password' => bcrypt('password'),
          'curp' => 'fozj910619hgtlnn04',
          'address'=> '',
          'phone' => '',
          'role' => 'admin'
        ]);

        App\User::create([
          'name' => 'Paciente Test',
          'email' => 'riquelme_2112@hotmail.com',
          'password' => bcrypt('password'),
          'curp' => 'fozj910619hgtlnn04',
          'address'=> '',
          'phone' => '',
          'role' => 'patient'
        ]);

        App\User::create([
          'name' => 'Médico Test',
          'email' => 'desarrollo@salamanca.gob.mx',
          'password' => bcrypt('password'),
          'curp' => 'fozj910619hgtlnn04',
          'address'=> '',
          'phone' => '',
          'role' => 'doctor'
        ]);

        factory(App\User::class, 50)->states('patient')->create();
    }
}
