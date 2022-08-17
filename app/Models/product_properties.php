<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_properties extends Model
{

    protected $table = 'product_properties';


    protected $primaryKey  = 'id';

    protected $fillable = [
        'name', 'description','product_no'
    ];
}
