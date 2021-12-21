<?php

namespace App\Models;

class Message extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['dateFormatted'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

           /**
     * Get date as formatted
     */
    public function getDateFormattedAttribute()
    {
        return $this->createdAt->format('d M, Y h:i A');
    }
}
