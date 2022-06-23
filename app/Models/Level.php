<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['school_id','title','slug','level_date','description',
        'image'];

    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id','id');
    }

    public function getAll()
    {
        return $this->with('school')->latest()->get();
    }
}
