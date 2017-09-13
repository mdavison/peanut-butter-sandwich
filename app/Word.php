<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['word', 'image'];

    /**
     * @param int $currentWordID
     * @return int
     */
    public static function nextWordID($currentWordID)
    {
        //return $currentWordID + 1;

        $nextWordID = static::where('id', '>', $currentWordID)->orderBy('id', 'asc')->pluck('id')->first();
        if (!empty($nextWordID)) {
            return $nextWordID;
        }

        // Return the first word
        return static::orderBy('id', 'asc')->pluck('id')->first();
    }
}
