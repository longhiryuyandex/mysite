<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Secguard extends Controller
{
    public function filter_data($data){
        $result = strip_tags($data);

        return $result;
    }
}
