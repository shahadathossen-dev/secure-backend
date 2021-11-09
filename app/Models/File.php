<?php

namespace App\Models;

class File extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'file' => 'array'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        //
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        //
    ];

    /**
     * Get the custom permissions name of the resource
     *
     * @var array
     */
    public static $permissions = [
        //
    ];
}
