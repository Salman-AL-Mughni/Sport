
@extends('layouts.index')
@section('ss')


<div class="x_content">
        <br />
        <form method="post"   @if(isset($data)) action="{{ route('matcht.update', $data->id) }}" @else action="{{ route('matcht.store') }}"  @endif>
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
                    <strong>تعديل موعد المباريات</strong>
                @else
                    <strong>اضافة مواعيد مباريات</strong>
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
                    <input name="League_number" type="text" id="first-name"  class="form-control  @error('League_number') is-invalid @enderror"  value="{{ old('League_number',isset($data->League_number)?$data->League_number:'') }}">
                    @error('League_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> رقم النادي
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="Club_number" type="text" id="first-name"  class="form-control   @error('Club_number') is-invalid @enderror"  value="{{ old('Club_number',isset($data->Club_number)?$data->Club_number:'') }}">
                    @error('Club_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> التاريخ والوقت
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="date" type="text" id="first-name"  class="form-control  @error('date') is-invalid @enderror"  value="{{ old('date',isset($data->date)?$data->date:'') }}">
                    @error('date')
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
