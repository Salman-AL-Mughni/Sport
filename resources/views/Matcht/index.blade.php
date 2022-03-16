
@extends('layouts.index')
@section('ss')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> عرض مواعيد المباريات
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
                    <th> العمليات</th>
                    <th> التارخ والوقت</th>
                    <th>اسم الدوري</th>
                    <th>رقم الدوري</th>
                       


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                    <tr>

                    <td>
                            <a href="{{url('dashboard/matcht/delete/'.$data->id)}}"><i class="fa fa-fw fa-times-circle" style="font-size: 23px;color: #ff0000"></i></a>
                            <a href="{{url('dashboard/matcht/'.$data->id.'/edit')}}"> <i class="fa fa-fw fa-edit "  style="font-size: 23px"></i></a>

                        </td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->Club_number}}</td>
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
