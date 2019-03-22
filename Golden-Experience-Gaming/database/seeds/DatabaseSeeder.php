<?php

use Illuminate\Database\Seeder;
use \app\User;
use app\Game;
use \app\Opinion;
use app\Transaction;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->create_users();
        $this->create_games();
        $this->create_transactions();
        $this->create_opinions();
    }

    public function create_users()
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
        public function create_games()
        {
          $game =Game::create([
            'id' => 1,
            'name' => 'G A M E',
            'price' => 19.50,
            'description' => 'Direct trade post-ironic authentic, air plant kogi
                              hell of meditation. Venmo typewriter wayfarers church-key
                              cred. Four dollar toast enamel pin disrupt direct
                              trade lo-fi vaporware neutra man braid yuccie taxidermy.
                              3 wolf moon selvage raclette four dollar toast.
                              Bespoke coloring book stumptown typewriter, tumeric
                              retro narwhal meh wolf everyday carry.',
            'publisher_id' => 4
          ]);
          $game->users()->sync([2,3]);
          $game = Game::create([
            'id' => 2,
            'name' => 'Fallout 46',
            'price' => 59.99,
            'description' => 'Farm-to-table poke aesthetic, celiac humblebrag
                              lo-fi subway tile try-hard put a bird on it waistcoat
                              banjo coloring book mixtape bicycle rights pok pok.
                              Wayfarers jianbing live-edge bushwick.
                              Farm-to-table before they sold out offal,
                              franzen mumblecore man bun lumbersexual fam.
                              Trust fund cray kinfolk intelligentsia lumbersexual
                              yr salvia mustache vape hashtag man bun street art
                              whatever listicle lyft.',
            'publisher_id' => 4
          ]);
          $game->users()->sync([3]);
        }
        public function create_transactions(){
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

        public function create_opinions(){
            Opinion::create([
              'body' => 'Sometimes, it simply doesn\'t work',
              'score' => 2,
              'user_id' => 3,
              'game_id' => 2
            ]);
        }
    }

