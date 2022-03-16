
@extends('layouts.index')
@section('ss')

<div class="x_content">
        <br />
        <form method="post"   @if(isset($data)) action="{{ route('Cyclique.update', $data->id) }}}}" @else action="{{ route('Cyclique.store') }}"  @endif>
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
                    <strong>تعديل الدوري</strong>
                @else
                    <strong>اضافة دوري جديد</strong>
                @endif
            </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> اسم الدوري
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="name" type="text" id="first-name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name',isset($data->name)?$data->name:'') }}">
                    @error('name')
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
