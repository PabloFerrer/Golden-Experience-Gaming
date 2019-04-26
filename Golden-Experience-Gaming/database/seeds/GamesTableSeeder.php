<?php

use Illuminate\Database\Seeder;
use App\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $game =Game::create([
        'id' => 1,
        'name' => 'G A M E',
        'price' => 19.50,
        'synopsis' => "It's not a game. It's an experience. G A M E",
        'description' => 'Direct trade post-ironic authentic, air plant kogi
                          hell of meditation. Venmo typewriter wayfarers church-key
                          cred. Four dollar toast enamel pin disrupt direct
                          trade lo-fi vaporware neutra man braid yuccie taxidermy.
                          3 wolf moon selvage raclette four dollar toast.
                          Bespoke coloring book stumptown typewriter, tumeric
                          retro narwhal meh wolf everyday carry.',
        'publisher_id' => 4,
        'icon_url' => 'default_icon.png',
        'image_url' => 'game_1_image.png'
      ]);
      $game->users()->sync(array(
          2 => array('owned' => 1, 'on_cart' => 0),
          3 => array('owned' => 1, 'on_cart' => 0)
        ));
      $game->genres()->sync([13,6,5]);

      $game = Game::create([
        'id' => 2,
        'name' => 'Fallout 46',
        'price' => 59.99,
        'synopsis' => "Prepare to explore a radiactive wasteland filled with giant bugs. Because sometimes,
                      it just doesn't work.",
        'description' => 'Farm-to-table poke aesthetic, celiac humblebrag
                          lo-fi subway tile try-hard put a bird on it waistcoat
                          banjo coloring book mixtape bicycle rights pok pok.
                          Wayfarers jianbing live-edge bushwick.
                          Farm-to-table before they sold out offal,
                          franzen mumblecore man bun lumbersexual fam.
                          Trust fund cray kinfolk intelligentsia lumbersexual
                          yr salvia mustache vape hashtag man bun street art
                          whatever listicle lyft.',
        'publisher_id' => 4,
        'icon_url' => 'default_icon.png',
        'image_url' => 'game_2_image.png'
      ]);
      $game->users()->sync(array(
          2 => array('owned' => 2, 'on_cart' => 1),
          3 => array('owned' => 1, 'on_cart' => 0)
        ));
      $game->genres()->sync([13,6,5]);

      $game = Game::create([
        'id' => 3,
        'name' => "JoJo's Bizarre Adventure: Last Survivor",
        'price' => 59.99,
        'synopsis' => "Release the power of your STAND in an epic battle
                       against questionably dressed opponents and aztec gods of
                       fitness",
        'description' => 'Farm-to-table poke aesthetic, celiac humblebrag
                          lo-fi subway tile try-hard put a bird on it waistcoat
                          banjo coloring book mixtape bicycle rights pok pok.
                          Wayfarers jianbing live-edge bushwick.
                          Farm-to-table before they sold out offal,
                          franzen mumblecore man bun lumbersexual fam.
                          Trust fund cray kinfolk intelligentsia lumbersexual
                          yr salvia mustache vape hashtag man bun street art
                          whatever listicle lyft.',
        'publisher_id' => 4,
        'icon_url' => 'default_icon.png',
        'image_url' => 'game_3_image.png'
      ]);
      $game->users()->sync(array(
          2 => array('owned' => 1, 'on_cart' => 0),
          3 => array('owned' => 2, 'on_cart' => 0)
        ));
      $game->genres()->sync([8,3]);

      $game = Game::create([
        'id' => 4,
        'name' => "NapoopaN TotauatoT",
        'price' => 59.95,
        'synopsis' => "CompmoC yooy TotauatoT collecelloc wiiw thiht
                       DefinifeD EditidE oo TotauatoT: NapoopaN, whihw inclulcni
                       alla DUD anna feaUaef updaadpu sinnis thht gaag releeler.",
        'description' => 'Farm-to-table poke aesthetic, celiac humblebrag
                          lo-fi subway tile try-hard put a bird on it waistcoat
                          banjo coloring book mixtape bicycle rights pok pok.
                          Wayfarers jianbing live-edge bushwick.
                          Farm-to-table before they sold out offal,
                          franzen mumblecore man bun lumbersexual fam.
                          Trust fund cray kinfolk intelligentsia lumbersexual
                          yr salvia mustache vape hashtag man bun street art
                          whatever listicle lyft.',
        'publisher_id' => 4,
        'icon_url' => 'default_icon.png',
        'image_url' => 'game_4_image.png'
      ]);
      $game->users()->sync(array(
          2 => array('owned' => 1, 'on_cart' => 0),
          3 => array('owned' => 0, 'on_cart' => 1)
        ));
      $game->genres()->sync([11,12]);

      $game = Game::create([
        'id' => 5,
        'name' => "GTA San Andreas: Remastered",
        'price' => 59.95,
        'synopsis' => "Ah shit, here we go again.",
        'description' => 'Farm-to-table poke aesthetic, celiac humblebrag
                          lo-fi subway tile try-hard put a bird on it waistcoat
                          banjo coloring book mixtape bicycle rights pok pok.
                          Wayfarers jianbing live-edge bushwick.
                          Farm-to-table before they sold out offal,
                          franzen mumblecore man bun lumbersexual fam.
                          Trust fund cray kinfolk intelligentsia lumbersexual
                          yr salvia mustache vape hashtag man bun street art
                          whatever listicle lyft.',
        'publisher_id' => 4,
        'icon_url' => 'default_icon.png',
        'image_url' => 'game_5_image.png'
      ]);
      $game->users()->sync(array(
          2 => array('owned' => 2, 'on_cart' => 0),
          3 => array('owned' => 0, 'on_cart' => 0)
        ));
      $game->genres()->sync([2,4,8]);
    }
}
