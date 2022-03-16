
@extends('layouts.index')
@section('ss')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> عرض المستخدمين
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

                    <th>عمليات</th>
                    <th>تاريخ تفعيل الطالب</th>
                    <th>البريد الالكتروني</th>
                        <th>اسم الطالب</th>
                      
                     
                       

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>

                    <td><a href="{{url('dashboard/users/delete/'.$user->id)}}"><i class="fa fa-fw fa-times-circle" style="font-size: 23px;color: #ff0000"></i></a>
                            <a href="{{url('dashboard/users/'.$user->id.'/edit')}}"> <i class="fa fa-fw fa-edit "  style="font-size: 23px"></i></a>

                        </td>
                        <td>{{$user->email_verifed_at}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                     
                       
                     

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
