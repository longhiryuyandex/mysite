<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','cateID','unit','img','weight','desc'];
}
