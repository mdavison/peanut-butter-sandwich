<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([
            'word' => 'Bulbasaur',
            'image' => '001.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Ivysaur',
            'image' => '002.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Venusaur',
            'image' => '003.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Charmander',
            'image' => '004.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Charmeleon',
            'image' => '005.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Charizard',
            'image' => '006.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Squirtle',
            'image' => '007.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Wartortle',
            'image' => '008.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Blastoise',
            'image' => '009.png',
        ]);
        DB::table('words')->insert([
            'word' => 'Caterpie',
            'image' => '010.png',
        ]);
    }
}
