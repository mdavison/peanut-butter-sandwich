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
     * @param User $user
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

    /**
     * Get the next Pokemon in order by index that is not in the User's collection
     * @param User $user
     * @return Pokemon
     */
    public static function nextPokemonNotInCollection(User $user)
    {
        $pokemon = static::orderBy('index', 'asc')->first();

        while ($user->pokemon->contains('index', $pokemon->index)) {
            // If it's in the collection, find the next one in order by index
            $pokemon = Pokemon::where('index', '>', $pokemon->index)->orderBy('index', 'asc')->first();
        }

        return $pokemon;
    }

    /**
     * Get a random Pokemon not in a User's collection
     *
     * @param User $user
     * @return Pokemon
     */
    public static function randomPokemonNotInCollection(User $user)
    {
        // Get a random pokemon
        $pokemon = static::random();

        while ($user->pokemon->contains('index', $pokemon->index)) {
            // If it's in the user's collection, get a different random one
            $pokemon = Pokemon::random();
        }

        return $pokemon;
    }

    /**
     * Get a random Pokemon from a User's collection
     *
     * @param User $user
     * @return Pokemon
     */
    public static function randomPokemonInCollection(User $user)
    {
        // Get a random pokemon
        $pokemon = static::random();

        while (!$user->pokemon->contains('index', $pokemon->index)) {
            // If it's NOT in the collection, get another random one
            $pokemon = Pokemon::random();
        }

        return $pokemon;
    }

    /**
     * Get a random pokemon
     *
     * @return Pokemon
     */
    public static function random()
    {
        $firstPokemonByIndex = Pokemon::orderBy('id', 'asc')->first();
        $lastPokemonByIndex = Pokemon::orderBy('id', 'desc')->first();

        $randomInt = rand($firstPokemonByIndex->id, $lastPokemonByIndex->id);

        return static::find($randomInt);
    }
}
