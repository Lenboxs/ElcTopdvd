<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'games';

    public function branches()
    {
        return $this->belongsToMany( 'App\Branch', 'game_branch','game_id','branch_id' )->using( 'App\GameBranch' )->withTimestamps();
    }

    public function agerestricton()
    {
        return $this->hasOne( 'App\AgeRestriction');
    }

    public function genres()
    {
        return $this->belongsToMany( 'App\Genre', 'game_genre', 'game_id', 'genre_id' )->using( 'App\GameGenre' )->withTimestamps();
    }

    public function consoles()
    {
        return $this->belongsToMany( 'App\Console', 'game_console', 'game_branch_id', 'console_id')->using( 'App\GameConsole' )->withTimestamps();
    }
}
