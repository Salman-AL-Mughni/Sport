<?php

namespace App\Http\Controllers;

use App\Models\salman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=user::get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:users|max:100',
            'email' => 'required|unique:users|email',
            'password' => 'required|same:conf_password|min:6',
            'conf_password' => 'required',
        ],[],['name'=>'اسم الطالب','email'=>'البريد الالكتروني','password'=>'كلمة المرور','conf_password'=>'كلمة المرور']);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->email_verified_at=date('Y-m-d H:i:s' );
        $user->password=Hash::make ('123456');

        $user->save();
        return redirect()->back()->with('massage','تم اضافة طالب بنجاح');

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
        $user=User::find($id);
        return view('users.create',compact('user'));
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
            'name' => ['required',Rule::unique('users')->ignore($id),'max:100'],
            'email' => ['required',Rule::unique('users')->ignore($id)],
            'password' => 'nullable|same:conf_password|min:6',

        ],[],['name'=>'اسم الطالب','email'=>'البريد الالكتروني','password'=>'كلمة المرور','conf_password'=>'كلمة المرور']);

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->Password){
            $user->email_verified_at=date('Y-m-d H:i:s' );
            $user->password=Hash::make ('123456');
        }
        $user->save();
        return redirect()->back()->with('massage','تم تعديل طالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $user=User::find($id);
     $user->delete();
        return redirect()->back()->with('massage','تم حذف طالب بنجاح');

    }
}
