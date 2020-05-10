@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('workout')</script>
<!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all workouts</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/workouts/create')}}"><i class="fa fa-plus"></i>add workout</a>
                <a href="{{url('admin/workouts')}}"><i class="fa fa-recycle"></i>all workouts</a>
            </div>
        </div>
        <script type="text/javascript">
            function updateHref(para,val) {
                href = window.location.href
                hasPara = false
                if(href.indexOf('?')!=-1){
                    hasPara = true
                }
                if(href.indexOf(para)==-1){
                    if(hasPara == false)
                        href = href + "?"
                    else
                        href = href + "&"
                    href = href + para + "=" + val
                }
                else{
                    start = href.indexOf(para)
                    end = href.length
                    if(href.indexOf('&',start)!=-1)
                        end = href.indexOf('&',start)
                    href = href.substring(0,start)+para+"="+val+href.substring(end)
                }
                console.log(href)
                window.location.href = href
            }

        </script>
        <!-- Example single danger button -->
        <div class="btn-group" id="focus">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{'Focus:'.$contraintes['focus']}}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('focus','All')">All</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('focus','Upper_body')">Upper body</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('focus','Core')">Core</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('focus','Lower_body')">Lower body</a>
            </div>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group" id="difficulty">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{'Difficulty:'.$contraintes['difficulty']}}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('difficulty','All')">All</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('difficulty','Easy')">Easy</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('difficulty','Medium')">Medium</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('difficulty','Hard')">Hard</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('difficulty','Expert')">Expert</a>
            </div>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group" id="type">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{'Type:'.$contraintes['type']}}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('type','All')">All</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('type','Cardio')">Cardio</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('type','Strength')">Strength</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('type','Power')">Power</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('type','Function')">Function</a>
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
                    <td><a href="{{url('workout/view/').'/'.$v->id}}">{{$v->title}}</a></td>
                    <td>{{$v->focus}}</td>
                    <td>{{$v->type}}</td>
                    <td>{{$v->difficulty}}</td>
                    <td>{{$v->view}}</td>
                    <td>
                        <a href="{{url('admin/workouts/'.$v->id.'/edit')}}">edit</a>
                        <a  onclick="delCate({{$v->id}})">delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>

<script>

    //这里是删除分类的提示框
    function delCate(workout_id){
        layer.confirm('Are you sure to delete this workout?', {
            btn: ['yes','no'] //按钮
        }, function(){
            //传异步参数
            $.post("{{url('admin/workouts/')}}/"+workout_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                console.log(data);
                if(data.status == 0){
                    layer.msg(data.msg,{icon: 6});
                    //刷新当前界面
                    setTimeout(()=>window.location.reload(),1000);
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }, function(){
//            layer.msg('也可以这样', {
//                time: 20000, //20s后自动关闭
//                btn: ['明白了', '知道了']
//            });
        });
    }

</script>
@endsection
