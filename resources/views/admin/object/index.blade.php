@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('programme object','{{url('admin/object')}}');</script>
    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all object</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/object/create')}}"><i class="fa fa-plus"></i>add object</a>
                <a href="{{url('admin/object')}}"><i class="fa fa-recycle"></i>all object</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>program object name</th>
                    <th>operations</th>

                </tr>

                @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->id_program_object}}</td>
                        <td>{{$v->program_object_name}}</td>
                        <td>
                            <a href="{{url('admin/object/'.$v->id_program_object.'/edit')}}">edit</a>
                            <a  onclick="delCate({{$v->id_program_object}})">delete</a>
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
        function delCate(id_program_object){
            layer.confirm('Are you sure to delete this program object?', {
                btn: ['yes','no'] //按钮
            }, function(){
                layer.confirm('Are you sure to delete all programs of this object?', {
                    btn: ['yes', 'no'] //按钮
                },function(){
                    //传异步参数
                    $.post("{{url('admin/object/')}}/"+id_program_object,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                        console.log(data);
                        if(data.status == 0){
                            layer.msg(data.msg,{icon: 6});
                            //刷新当前界面
                            setTimeout(()=>window.location.reload(),1000);
                        }else{
                            layer.msg(data.msg, {icon: 5});
                        }
                    });
                }, function(){})
            },function () {})
        }

    </script>
@endsection
