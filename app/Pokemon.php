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
    public static function nextPokemonIndex($currentPokemonIndex, User $user = null)
    {
        // Find the next index in order
        $nextPokemonIndex = static::where('index', '>', $currentPokemonIndex)->orderBy('index', 'asc')->pluck('index')->first();

        if (!empty($nextPokemonIndex)) {
            if ($user) {
                // If the user has that pokemon already, get the next one
                $index = $nextPokemonIndex;
                while ($user->pokemon->contains('index', $nextPokemonIndex)) {
                    $index++;
                    $nextPokemonIndex = static::where('index', '>', $index)->orderBy('index', 'asc')->pluck('index')->first();
                }
            }

            return $nextPokemonIndex;
        }

        // Fall back to just returning the first index
        return static::orderBy('index', 'asc')->pluck('index')->first();
    }
}
