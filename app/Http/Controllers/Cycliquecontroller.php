<?php

namespace App\Http\Controllers;
use App\models\cyclique;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Cycliquecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = cyclique::all();
        return view('Cyclique.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cyclique.create');
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
            'name' => 'required|unique:cyclique|min:4',
        ],[],['name'=>'اسم الدوري']);
        $data=new cyclique();
         $data->name =  $request->name;

        $data->save();
       return redirect()->route('Cyclique.index')->with('massage','تم اضافة دوري  بنجاح');

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
        $data=cyclique::find($id);
        return view('Cyclique.create',compact('data'));
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
            'name' => ['required',Rule::unique('cyclique')->ignore($id),'max:100'],

        ],[],['name']);

        $data=cyclique::find($id);
        $data->name=$request->name;

        $data->save();
        return redirect()->back()->with('massage','تم تعديل الدوري بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=cyclique::find($id);
        $data->delete();
        return redirect()->back()->with('massage','تم حذف دوري بنجاح');
    }
}
