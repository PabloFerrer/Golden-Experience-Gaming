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
        'description' => 'Direct trade post-ironic authentic, air plant kogi
                          hell of meditation. Venmo typewriter wayfarers church-key
                          cred. Four dollar toast enamel pin disrupt direct
                          trade lo-fi vaporware neutra man braid yuccie taxidermy.
                          3 wolf moon selvage raclette four dollar toast.
                          Bespoke coloring book stumptown typewriter, tumeric
                          retro narwhal meh wolf everyday carry.',
        'publisher_id' => 4,
        'icon_url' => 'https://s3.eu-west-3.amazonaws.com/goldenexperiencegaming/images/default_icon.png',
        'image_url' => 'https://s3.eu-west-3.amazonaws.com/goldenexperiencegaming/images/default_image.png'
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
        'publisher_id' => 4,
        'icon_url' => 'https://s3.eu-west-3.amazonaws.com/goldenexperiencegaming/images/default_icon.png',
        'image_url' => 'https://s3.eu-west-3.amazonaws.com/goldenexperiencegaming/images/default_image.png'
      ]);
      $game->users()->sync([3]);
    }
}
