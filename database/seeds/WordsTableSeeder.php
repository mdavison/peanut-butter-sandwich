<?php

use App\Pokemon;
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
        // Pull in words from the Pokemon table
        $pokemon = Pokemon::all();

        foreach ($pokemon as $item) {
            DB::table('words')->insert([
                'word' => ucfirst($item->name),
                'image' => $item->image,
            ]);
        }
    }
}
