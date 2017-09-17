<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /**
     * Plural of pokemon is still pokemon; laravel will assume pokemons so we have to be explicit
     *
     * @var string
     */
    protected $table = 'pokemon';

    /**
     * The users that belong to the pokemon
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * @param int $currentPokemonIndex
     * @return int
     */
    public static function nextPokemonIndex($currentPokemonIndex)
    {
        $nextPokemonIndex = static::where('index', '>', $currentPokemonIndex)->orderBy('index', 'asc')->pluck('index')->first();
        if (!empty($nextPokemonIndex)) {
            return $nextPokemonIndex;
        }

        // Return the first word
        return static::orderBy('index', 'asc')->pluck('index')->first();
    }
}
