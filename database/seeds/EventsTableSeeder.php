<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Natural disasters
      DB::table('events')->insert([
          'name' => 'Earthquake',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_brun.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Tsunami',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_blue.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Storm',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_grisfonce.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Flood',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_blueclair.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Avalanche',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_grisclair.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Volcanic eruption',
          'type' => 'natural_disasters',
          'color' => '/assets/img/marker_redfonce.png'
      ]);
      //Technological hazards
      DB::table('events')->insert([
          'name' => 'Plant explosion',
          'type' => 'techno_hazards',
          'color' => '/assets/img/marker_jaune.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Pollution',
          'type' => 'techno_hazards',
          'color' => '/assets/img/marker_vert.png'
      ]);
      //Human hazards
      DB::table('events')->insert([
          'name' => 'Attacks',
          'type' => 'human_hazards',
          'color' => '/assets/img/marker_red.png'
      ]);
      DB::table('events')->insert([
          'name' => 'Hostage taking',
          'type' => 'human_hazards',
          'color' => '/assets/img/marker_orange.png'
      ]);
    }
}
