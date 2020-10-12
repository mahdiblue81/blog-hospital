<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Docter extends Model
{
    protected $table = 'docters';

    protected $fillable = [
        'skill', 'madrak', 'age', 'bio',
    ];



    //     protected $casts = [
    //         'data' => 'array',
    //    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function vists()
    {
        return $this->belongsToMany('App\Visit', 'docters_to_visits');
    }

    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'docter_to_shift');
    }

    public function turns()
    {
        return $this->BelongsToMany(Turn::class, 'docters_turns');
    }

    public function scopefindDocter($query, $value)
    {
        return $query->where('user_id', $value);
    }
}
