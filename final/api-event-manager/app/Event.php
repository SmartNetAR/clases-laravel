<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['id', 'date_time', 'name', 'place', 'description','price', 'large_description', 'capacity', 'created_at', 'deleted_at'];
}
