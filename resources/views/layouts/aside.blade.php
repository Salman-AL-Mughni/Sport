<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i>الرئيسية <span class="tag tag-info">جدید</span></a>
            </li>

            <li class="nav-title">
                مدير المركز
            </li>

            <li class="nav-item">

              <a class="nav-link" href="{{url('dashboard')}}"><i class="icon-user-follow"></i>الرئيسية</a>

                 <a class="nav-link" href="{{url('dashboard/users/create')}}"><i class="icon-people"></i>اضافة مستخدم</a>
                 <a class="nav-link" href="{{url('dashboard/users')}}"><i class="icon-user-following"></i> عرض المستخدمين</a>
                <a class="nav-link" href="{{url('dashboard/Cyclique/create')}}"><i class="icon-people"></i>اضافة دوري</a>
                <a class="nav-link" href="{{url('dashboard/Cyclique')}}"><i class="icon-user-following"></i> عرض الدوريات</a>
                <a class="nav-link" href="{{url('dashboard/club/create')}}"><i class="icon-people"></i>اضافة نادي</a>
                <a class="nav-link" href="{{url('dashboard/club')}}"><i class="icon-user-following"></i>عرض النوادي</a>
                <a class="nav-link" href="{{ route('matcht.create')  }}"><i class="icon-people"></i>اضافة موعد مبارة</a>
                <a class="nav-link" href="{{url('dashboard/Matcht')}}"><i class="icon-user-following"></i>عرض مواعيد المباريات</a>
                </ul>
            </li>



        </ul>
    </nav>
</div>
