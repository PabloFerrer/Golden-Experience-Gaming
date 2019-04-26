<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@test.es',
        'password' => Hash::make('azsxdc1'),
        'role' => 0,
        'wallet' => 0.0
      ]);
      User::create([
        'id' => 2,
        'name' => 'Client',
        'email' => 'client@test.es',
        'password' => Hash::make('azsxdc1'),
        'role' => 1,
        'wallet' => 4.52
      ]);
      User::create([
        'id' => 3,
        'name' => 'Client2',
        'email' => 'client2@test.es',
        'password' => Hash::make('azsxdc1'),
        'role' => 1,
        'wallet' => 0.73
      ]);
      User::create([
        'id' => 4,
        'name' => 'Publisher',
        'email' => 'publisher@test.es',
        'password' => Hash::make('azsxdc1'),
        'role' => 2,
        'wallet' => 560.43
      ]);
    }
}
