<?php

use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get up to 721 from http://pokeapi.co
        // Loop through all
        for ($i = 1; $i <= 721; $i++) {
            //$url = 'http://pokeapi.co/api/v2/pokemon/721/';
            $url = 'http://pokeapi.co/api/v2/pokemon/' . $i . '/';

            $curl_handle=curl_init();
            curl_setopt($curl_handle,CURLOPT_URL,$url);
            curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
            curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);

            if (!empty($buffer)){
                $name = json_decode($buffer)->forms[0]->name;
                $image = str_pad($i,  3, "0", STR_PAD_LEFT) . '.png';
                DB::table('pokemon')->insert([
                    'index' => $i,
                    'name' => $name,
                    'image' => $image,
                ]);
            }
        }

        // Individual ones that got missed in the loop
//        $i = 2;
//        $url = 'http://pokeapi.co/api/v2/pokemon/' . $i . '/';
//
//        $curl_handle=curl_init();
//        curl_setopt($curl_handle,CURLOPT_URL,$url);
//        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
//        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
//        $buffer = curl_exec($curl_handle);
//        curl_close($curl_handle);
//
//        if (!empty($buffer)){
//            $name = json_decode($buffer)->forms[0]->name;
//            $image = str_pad($i,  3, "0", STR_PAD_LEFT) . '.png';
//            DB::table('pokemon')->insert([
//                'index' => $i,
//                'name' => $name,
//                'image' => $image,
//            ]);
//        }
    }
}
