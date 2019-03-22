<?php

use Illuminate\Database\Seeder;
use app\User;

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
        'password' => 'azsxdc1',
        'role' => 0
      ]);
      User::create([
        'id' => 2,
        'name' => 'Client',
        'email' => 'client@test.es',
        'password' => 'azsxdc1',
        'role' => 1
      ]);
      User::create([
        'id' => 3,
        'name' => 'Client2',
        'email' => 'client2@test.es',
        'password' => 'azsxdc1',
        'role' => 1
      ]);
      User::create([
        'id' => 4,
        'name' => 'Publisher',
        'email' => 'publisher@test.es',
        'password' => 'azsxdc1',
        'role' => 2
      ]);
    }
}
