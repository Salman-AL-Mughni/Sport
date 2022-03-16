
@extends('layouts.index')
@section('ss')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> عرض الدوريات
            </div>
            @csrf
            @if (session()->has('massage'))
                <div class="alert alert-success">
                    {{session()->get('massage')}}
                </div>
            @endif
            <div class="card-block">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                     <td>العمليات</td>
                     <td>الدوري الذي يتبع له</td>
                     <td>اسم النادي</td>
                        <th>رقم الدوري</th>
                      

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                    <tr>

                    <td>
                    <a href="{{url('dashboard/club/delete/'.$data->id)}}"><i class="fa fa-fw fa-times-circle" style="font-size: 23px;color: #ff0000"></i></a>
                            <a href="{{url('dashboard/club/'.$data->id.'/edit')}}"> <i class="fa fa-fw fa-edit "  style="font-size: 23px"></i></a>
                    </td>
                    <td> {{$data->The_him}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->League_number}}</td>
                      
                    </tr>
                    @endforeach


                    </tbody>
                </table>
             
            </div>
        </div>
    </div>
    <!--/col-->

    </div>

@endsection
