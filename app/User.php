<?php

namespace App;

use App\queryCast\casts;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Type;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
    
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'isMember', 'email', 'phone', 'password', 'codMeli', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //         'data' => 'array',
    // ];


    //
    public function roles()
    {
        return $this->belongsToMany("App\Role", 'role_user');
    }

    public function clerkable()
    {
        return $this->morphMany(Clerk::class, 'clerk');
    }

    public function docters()
    {
        return $this->hasOne("App\Docter", 'user_id');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasAnyRole($role)
    {
        return $this->roles()->where('name', $role)->first();
    }

    public function noRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return false;
        }
    }
    public function hasOk($role)
    {

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function doctor_compelet($is_submit)
    {
        if ($this->docters()->where('submit', $is_submit)->first()) {
            return false;
        }
        return true;
    }

    public function clerk_compelet($is_submit)
    {
        if ($this->docters()->where('submit', $is_submit)->first()) {
            return false;
        }
        return true;
    }



    public function scopeloginCheck(Builder $query)
    {
        $result = $query->where('id', Auth::user()->id)->where('isMember', 1)->whereNull('is_active')->get()->toArray();
        if (count($result) !== 1) {
            return false;
        }
        return true;
    }

    public function scopeCheckDocter(Builder $query)
    {
        return $query->where('isMember', 1)->where('is_active', 1)->get();
    }

    public function scopeisActive(Builder $query, $isActive)
    {
        return $query->where('is_active', $isActive)->get();
    }

    public function scopeloginFalse(Builder $query)
    {
        $result = $query->where('id', Auth::user()->id)->where('isMember', 1)->where('is_active', 0)->get()->toArray();
        if (count($result) !== 1) {
            return false;
        }
        return true;
    }

    public function scopeCheckClerk(Builder $query)
    {
        $result = $query->where('id', Auth::user()->id)->where('isMember', 3)->whereNull('is_active')->get()->toArray();
        if (count($result) !== 1) {
            return false;
        }
        return true;
    }

    public function scopeFalseClerk(Builder $query)
    {
        $result = $query->where('id', Auth::user()->id)->where('isMember', 3)->where('is_active', 0)->get()->toArray();
        if (count($result) !== 1) {
            return false;
        }
        return true;
    }



    public function scopeisMember(Builder $query, $isMember)
    {
        return $query->where('isMember', $isMember)->whereNull('is_active');
    }
}
