
@extends('layouts.index')
@section('ss')

    <div class="x_content">
        <br />
        <form  method="post"  @if(isset($data)) action="{{ route('club.update', $data->id) }}" @else action="{{ route('club.store') }}"  @endif>
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
                    <strong>تعديل النادي</strong>
                @else
                    <strong>اضافة النادي جديد</strong>
                @endif
            </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> رقم الدوري
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="League_number" type="text" id="first-name"  class="form-control @error('League_number') is-invalid @enderror"  value="{{ old('League_number',isset($data->League_number)?$data->League_number:'') }}">
                    @error('League_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">اسم النادي
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input  type="text" id="last-name" name="name"  class="form-control @error('name') is-invalid @enderror"  value="{{ old('name',isset($data->name)?$data->name:'') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">الدوري الذي يتبع له</label>
                <div class="col-md-6 col-sm-6 ">
                    <input id="middle-name" class="form-control @error('The_him') is-invalid @enderror"  value="{{ old('name',isset($data->The_him)?$data->The_him:'') }}" type="text" name="The_him">
                    @error('The_him')
                    <div class="text-danger">{{ $message }}</div>
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
