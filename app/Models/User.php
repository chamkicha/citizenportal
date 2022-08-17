<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $primaryKey = 'id';

    protected $table =  'users';

    /**
     * Route notifications for the mail channel.
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {

        // Return email address only...
        return $this->email;


    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','full_name','phone_no','email_verified_at','permissions',
         'last_login','first_name','last_name','bio','gender','dob','pic','country',
         'user_state','city','address','location','role','tin_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function getAuthPassword()
    {
        return $this->password;
    }


}
