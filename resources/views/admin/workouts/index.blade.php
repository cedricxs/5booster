@extends('layout.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理
</div>
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>分类列表</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/workouts/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                <a href="{{url('admin/workouts')}}"><i class="fa fa-recycle"></i>全部分类</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>title</th>
                    <th>focus</th>
                    <th>type</th>
                    <th>difficulty</th>
                    <th>view</th>
                    <th>operations</th>

                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->id}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->focus}}</td>
                    <td>{{$v->type}}</td>
                    <td>{{$v->difficulty}}</td>
                    <td>{{$v->view}}</td>
                    <td>
                        <a href="{{url('admin/category/'.$v->id.'/edit')}}">change</a>
                        <a href="javascript::" onclick="delCate({{$v->id}})">delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>
</form>

<script>

    //这里是删除分类的提示框
    function delCate(cate_id){
        layer.confirm('您确定要删除这个分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //传异步参数
            $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status == 0){
                    //刷新当前界面
                    window.location.reload();
                    layer.msg(data.msg,{icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            alert(cate_id);
           // layer.msg('的确很重要', {icon: 1});
        }, function(){
//            layer.msg('也可以这样', {
//                time: 20000, //20s后自动关闭
//                btn: ['明白了', '知道了']
//            });
        });
    }

</script>
@endsection
