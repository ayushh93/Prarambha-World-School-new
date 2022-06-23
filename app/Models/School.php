<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['title','slug'];

    public function level()
    {
        return $this->belongsToMany('App\Models\Level');
    }
}
