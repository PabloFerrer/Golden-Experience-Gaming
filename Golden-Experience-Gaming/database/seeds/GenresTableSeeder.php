<?php

use Illuminate\Database\Seeder;
use App\Genre;
use Illuminate\Database\Eloquent\Model; 


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Genre::create([
        'id' => 1,
        'name' => 'Fantasy'
      ]);

      Genre::create([
        'id' => 2,
        'name' => 'RPG'
      ]);

      Genre::create([
        'id' => 3,
        'name' => 'FPS'
      ]);

      Genre::create([
        'id' => 4,
        'name' => 'TPS'
      ]);

      Genre::create([
        'id' => 5,
        'name' => 'Horror'
      ]);

      Genre::create([
        'id' => 6,
        'name' => 'Sci-fi'
      ]);

      Genre::create([
        'id' => 7,
        'name' => 'Medieval'
      ]);

      Genre::create([
        'id' => 8,
        'name' => 'Modern'
      ]);

      Genre::create([
        'id' => 9,
        'name' => 'Post-Apocaliptic'
      ]);

      Genre::create([
        'id' => 11,
        'name' => 'Grand Strategy'
      ]);

      Genre::create([
      	'id' => 12,
        'name' => 'RTS'
      ]);

      Genre::create([
      	'id' => 13,
        'name' => 'Puzzle'
      ]);


    }
}
