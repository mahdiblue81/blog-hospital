<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class madrak extends Model
{
    protected $fillable=[
        'title'
    ];

    public function setTitleattribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }
}
