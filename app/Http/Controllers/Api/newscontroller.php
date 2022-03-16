<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\models\cyclique;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class newscontroller extends Controller
{

    public function getnews(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:cyclique|max:100',
        ],[],['name'=>'اسم الدوري']);
        $data=new cyclique();
         $data->name =  $request->name;


        $data->save();
        return redirect()->back()->with('massage','تم اضافة دوري  بنجاح');
    }


}
