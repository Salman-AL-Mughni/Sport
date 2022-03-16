<?php

namespace App\Http\controllers\Api;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\models\matcht;
use Illuminate\Validation\Rule;

class Matchtcontroller extends Controller
{

    public function matcht(Request $request)
    {

        return matcht::all();

    }
}

