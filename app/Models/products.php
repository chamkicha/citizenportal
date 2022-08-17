<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{


    protected $table = 'products';


    protected $primaryKey  = 'id';

    protected $fillable = [
        'name', 'description','price','product_image','updated_by','categories_id','status','product_no'
    ];
}
