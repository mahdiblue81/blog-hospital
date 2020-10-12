<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['bio','clerk_type','clerk_id'];

    public function clerk()
    {
        return $this->morphTo();
    }

}
