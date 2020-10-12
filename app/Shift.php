<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Shift extends Model
{
    protected $fillable = [
        'yers', 'month', 'time_start', 'time_end, isCount', 'nowTime',
    ];
    protected $table = 'shifts';


    public function docters()
    {
        return $this->belongsToMany(Docter::class, 'docter_to_shift');
    }

    public function vists()
    {
        return $this->belongsToMany(Visit::class, 'visits_to_shifts');
    }

    public function getTimeStartAttribute($value)
    {
        return Carbon::parse($value)->toTimeString();
    }
    public function getTimeEndAttribute($value)
    {
        return Carbon::parse($value)->toTimeString();
    }


    public function TimeBetween($time, $time_start, $time_end)
    {
        $start = Carbon::parse($time_start)->toTimeString();
        $end = Carbon::parse($time_end)->toTimeString();
        $time = Carbon::parse($time);
        return $time->between($time_start, $time_end);
    }

    public function scopeCheckDateTime($query, $yers, $month)
    {
        $query->where([
            'yers' => $yers,
            'month' => $month
        ]);
    }

    public function countVisit($time_start, $time_end)
    {
        $carbon = new Carbon();
        $start = $carbon->parse($time_start)->toTimeString();
        $end = $carbon->parse($time_end);
        $time = $end->diffInMinutes($start) / 60;
        return floor($time);
    }
}
