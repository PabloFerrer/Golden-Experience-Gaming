<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Transaction::create([
        'amount' => 19.50,
        'game_id' => 1,
        'buyer_id' =>2
      ]);
      Transaction::create([
        'amount' => 19.50,
        'game_id' => 1,
        'buyer_id' =>3
      ]);
      Transaction::create([
        'amount' => 59.99,
        'game_id' => 2,
        'buyer_id' =>3
      ]);
    }
}
