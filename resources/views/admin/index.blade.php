@extends('layout.admin')
@section('content')
    <!--头部 开始-->
    <div class="top_box">
        <div class="top_left">
            <div class="logo">后台管理模板</div>
            <ul>
                <li><a href="{{url('/admin')}}"  class="active">首页</a></li>
                <li><a href="{{url('/admin/info')}}" >管理页</a></li>
            </ul>
        </div>
        <div class="top_right">
            <ul>
                <li>管理员：{{$admin->username}}</li>
                <li><a href="{{url('/admin/pass')}}" >修改密码</a></li>
                <li><a href="{{url('/admin/quit')}}">退出</a></li>
            </ul>
        </div>
    </div>
    <!--头部 结束-->

    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>Gestion</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/workouts/create')}}" ><i class="fa fa-fw fa-plus-square"></i>Add</a></li>
                    <li><a href="{{url('admin/workouts')}}" ><i class="fa fa-fw fa-list-ul"></i>All Workout</a></li>
{{--                    <li><a href="{{url('admin/article/create')}}" ><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>--}}
{{--                    <li><a href="{{url('admin/article')}}" ><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>--}}
                </ul>
            </li>
{{--            <li>--}}
{{--                <h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>--}}
{{--                <ul class="sub_menu" style="display: block">--}}
{{--                    <li><a href="{{url('admin/links')}}"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>--}}
{{--                    <li><a href="{{url('admin/navs')}}" ><i class="fa fa-fw fa-navicon"></i>自定义导航</a></li>--}}
{{--                    <li><a href="{{url('admin/config')}}"><i class="fa fa-fw fa-cogs"></i>网站配置</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        </ul>
    </div>
    <!--左侧导航 结束-->

    <!--底部 开始-->
    <div class="bottom_box">
        CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
    </div>
    <!--底部 结束-->

@endsection
