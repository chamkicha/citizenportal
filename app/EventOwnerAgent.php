<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EventOwnerAgent extends Authenticatable
{
    use Notifiable;


    protected $table = 'tblEvenOwnerAgent';

    public $timestamps =  false;

    protected $primaryKey  = 'Id';

    protected $fillable = [
        'email', 'Password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function getAuthPassword()
    {
        return $this->Password;
    }

}
