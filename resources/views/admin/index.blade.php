@extends('layout.admin')
@section('content')


    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Program</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/programs')}}" ><i class="fa fa-fw fa-list-ul"></i>Progrms Plan</a></li>
                    <li><a href="{{url('admin/niveau')}}" ><i class="fa fa-fw fa-list-ul"></i>Program Niveau</a></li>
                    <li><a href="{{url('admin/object')}}" ><i class="fa fa-fw fa-list-ul"></i>Program Object</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Recette</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/recettes/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add Recette</a></li>
                    <li><a href="{{url('admin/recettes')}}" ><i class="fa fa-fw fa-list-ul"></i>All Recettes</a></li>
                    <li><a href="{{url('admin/ingredients/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add Ingredient</a></li>
                    <li><a href="{{url('admin/ingredients')}}" ><i class="fa fa-fw fa-list-ul"></i>All Ingredients</a></li>

                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Abonnement</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/codepromos/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add Code promo</a></li>
                    <li><a href="{{url('admin/codepromos')}}" ><i class="fa fa-fw fa-list-ul"></i>All Code promos</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--左侧导航 结束-->

    <div id="admin_container">
        @yield('container')
    </div>


@endsection
