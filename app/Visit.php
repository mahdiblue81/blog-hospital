<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Docter;
use App\Shift;
class Visit extends Model
{
    protected $fillable = [
        'day', 'time_start', 'time_end,',
    ];

    protected $table = 'visits';


    public function docters()
    {
        return $this->belongsToMany(Docter::class,'docters_to_visits');
    }


    public function shifts()
    {
        return $this->belongsToMany(Shift::class,'visits_to_shifts');
    }

    public function setStartTimeVisit($time, $count)
    {
        $carbon = new Carbon();
        $start = $carbon->parse($time)->toTimeString();
        $horse = "$count:00:00";
        return $carbon->createFromFormat('H:i:s', $start)->addHours(intval($horse))->toTimeString();
    }

    public function setEndTimeVisit($time, $count)
    {
        $carbon = new Carbon();
        $end = $carbon->parse($time)->toTimeString();
        $horse = "$count:00:00";
        return $carbon->createFromFormat('H:i:s', $end)->addHours(intval($horse))->toTimeString();
    }



    public function getTimeStartAttribute($value)
    {
        return Carbon::parse($value)->toTimeString();
    }
    
    public function getTimeEndAttribute($value)
    {
        return Carbon::parse($value)->toTimeString();
    }

    public function scopefindDocter($query, $value)
    {
        return $query->where('user_id', $value);
    }

    public function scopefindUser($query, $value)
    {
        return $query->where('user_id', $value);
    }

    public function scopeGetShiftByDay($query, $day,$shiftId)
    {
        return $query->where('day', $day)->where('shift_id', $shiftId);
    }

    public function scopeVisitFalse($query, $day,$shiftId,$userID)
    {
        return $query->where('day', $day)->where('shift_id', $shiftId)->where('user_id', $userID);
    }
}


