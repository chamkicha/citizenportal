<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services_provider extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'ServiceProviderName',
        'TinNo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'CreatedDate' => 'datetime',
    ];
}
