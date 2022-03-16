<?php

namespace App\Http\Controllers;
use App\models\club;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class clubcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=club::get();
        return view('club.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.create');
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
            'name' => 'required|unique:club|max:100',
            'League_number' => 'required|unique:club|max:15',
            'The_him' => 'required|unique:club|max:100',

        ],[],['name'=>'اسم النادي','League_number'=>'رقم الدوري','The_him'=>'الدوري الذي يتبع له']);
        $data=new club();
        $data->name =  $request->name;
        $data->League_number =  $request->League_number;
        $data->The_him =  $request->The_him;


        $data->save();
        return redirect()->route('club.index')->with('massage','تم اضافة نادي  بنجاح');

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
        $data=club::find($id);
        return view('club.create',compact('data'));
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
            'name' => ['required',Rule::unique('club')->ignore($id),'max:100'],
            'League_number' => ['required',Rule::unique('club')->ignore($id),'max:100'],
            'The_him' => ['required',Rule::unique('club')->ignore($id),'max:100'],

        ],[],['name','League_number','The_him']);

        $data=club::find($id);
        $data->name=$request->name;
        $data->League_number=$request->League_number;
        $data->The_him=$request->The_him;

        $data->save();
        return redirect()->back()->with('massage','تم تعديل النادي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=club::find($id);
        $data->delete();
        return redirect()->back()->with('massage','تم حذف نادي بنجاح');
    }
}
