<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{


    protected $table = 'categories';


    protected $primaryKey  = 'id';

    protected $fillable = [
        'category_name', 'description','permissions',
    ];
}
