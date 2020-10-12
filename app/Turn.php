<?php

namespace App;

use DateTime;
use Illuminate\Support\Carbon;
use Hekmatinasser\Verta\Verta;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;

class Turn extends Model
{
    protected $table = 'turns';

    protected $fillable = [
        'date', 'time_start', 'time_end'
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];


    public function doctors()
    {
        return $this->BelongsToMany(Docter::class, 'docters_turns');
    }



    

    public function getTimeEndAttribute($value)
    {
        return Carbon::parse($value)->toTimeString();
    }
    public function getDateAttribute($value)
    {
        $carbon = new Carbon();
        return $carbon->toDateString($value);
        // return Carbon::parse($value)->toDateString();
    }

    public function TimeBetween($time, $time_start, $time_end)
    {
        $start = Carbon::parse($time_start)->toTimeString();
        $end = Carbon::parse($time_end)->toTimeString();
        $time = Carbon::parse($time);
        return $time->between($time_start, $time_end);
    }

    // public function scopeCeckeDateTime($query, $date)
    // {
    //     return $query->where('date', $date)->get();
    // }
}
