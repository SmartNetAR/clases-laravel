<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'eventId', 'userId', 'date'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /*
            $table->bigIncrements('id');
            $table->uuid('event_id');
            $table->foreing('event_id')->references('id')->on('events');
            $table->unsignedBigInteger('user_id');
            $table->foreing('user_id')->references('id')->on('users');
            $table->dateTime('date');
     */
}
