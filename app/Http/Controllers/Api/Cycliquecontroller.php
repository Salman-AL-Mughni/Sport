<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\models\club;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Cycliquecontroller extends Controller
{

    public function Cycliqu($type)
    {

        return club::where('name','like', '%' . $type . '%')->get();

    }


}
