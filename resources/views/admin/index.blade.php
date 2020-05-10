@extends('layout.admin')
@section('content')


    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Workout</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/workouts/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add Workout</a></li>
                    <li><a href="{{url('admin/workouts')}}" ><i class="fa fa-fw fa-list-ul"></i>All Workout</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Recette</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/recettes/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add Recette</a></li>
                    <li><a href="{{url('admin/recettes')}}" ><i class="fa fa-fw fa-list-ul"></i>All Recette</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--左侧导航 结束-->

    <div id="admin_container">
        @yield('container')
    </div>


@endsection
