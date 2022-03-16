<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\matcht;
use Illuminate\Validation\Rule;

class Matchtcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=matcht::get();
        return view('matcht.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matcht.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'League_number' => 'required|unique:matcht|max:15',
        'Club_number' => 'required|unique:matcht|max:15',
           'date' => 'required|unique:matcht|max:40',
    ],[],['League_number'=>'رقم الدوري','Club_number'=>'رقم النادي','date'=>'التاريخ والوقت']);
        $data=new matcht();
        $data->League_number =  $request->League_number;
        $data->Club_number =  $request->Club_number;
        $data->date =  $request->date;


        $data->save();
       return redirect()->route('matcht.index')->with('massage','تم اضافة مواعيد المباريات بنجاح');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=matcht::find($id);
        return view('matcht.create',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'League_number' => ['required',Rule::unique('matcht')->ignore($id),'max:100'],
            'Club_number' => ['required',Rule::unique('matcht')->ignore($id),'max:100'],
            'date' => ['required',Rule::unique('matcht')->ignore($id),'max:100'],

        ],[],['League_number'=>'رقم الدوري','Club_number'=>'رقم النادي','date'=>'التاريخ والوقت']);
        $data=matcht::find($id);
        $data->League_number =  $request->League_number;
        $data->Club_number =  $request->Club_number;
        $data->date =  $request->date;


        $data->save();
        return redirect()->back()->with('massage','تم تعديل مواعيد المباريات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=matcht::find($id);
        $data->delete();
        return redirect()->back()->with('massage','تم حذف موعد بنجاح ');
    }
}
