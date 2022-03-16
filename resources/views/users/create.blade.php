
@extends('layouts.index')
@section('ss')

    <div class="x_content">
        <br />
        <form method="post"   @if(isset($user)) action="/dashboard/users/update/{{$user->id}}" @else action="/dashboard/users/save"  @endif>
            @csrf
            @if (session()->has('massage'))
                <div class="alert alert-success">
                    {{session()->get('massage')}}
                </div>
            @endif
            <div class="col-md-12 text-center ">
                <div class="card">
            <div class="card-header">
                @if(isset($data))
                    <strong>تعديل مستخدم</strong>
                @else
                    <strong>اضافة مستخدم جديد</strong>
                @endif
            </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> اسم المستخدم 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="name" type="text" id="first-name" required="required" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name',isset($user->name)?$user->name:'') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> البريد الالكتروني 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="email" type="email" id="first-name" required="required" class="form-control   @error('email') is-invalid @enderror" value="{{ old('email',isset($user->email)?$user->email:'') }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> كلمة المرور 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="password" type="password" id="first-name" required="required" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          

               
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">  اعادة كلمة المرور 
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="conf_password" type="text" id="first-name" required="required" class="form-control @error('conf_password') is-invalid @enderror" value="{{ old('conf_password') }}">
                    @error('conf_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          

            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>


@endsection
