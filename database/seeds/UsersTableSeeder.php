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

        factory(App\User::class, 50)->create();
    }
}
