<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Cyclique;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class clubcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function club($type)
    {
        //return Cyclique::all();
       return Cyclique::where('name', 'like', '%' . $type . '%')->get();
       
    }


}
