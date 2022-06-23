<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabimage extends Model
{
    protected $fillable = ['tab_id','title','image'];

    public function tab()
    {
        return $this->belongsTo('App\Models\Tab','tab_id','id');
    }

    public function getAll()
    {
        return $this->with('tab')->latest()->get();
    }
}
