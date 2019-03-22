<?php

use Illuminate\Database\Seeder;
use app\Opinion;

class OpinionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Opinion::create([
        'body' => 'Sometimes, it simply doesn\'t work',
        'score' => 2,
        'user_id' => 3,
        'game_id' => 2
      ]);
    }
}
