@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('ingredient','{{url('admin/ingredients')}}')</script>
    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all ingredients</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/ingredients/create')}}"><i class="fa fa-plus"></i>add ingredient</a>
                <a href="{{url('admin/ingredients')}}"><i class="fa fa-recycle"></i>all ingredients</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>ingredient name</th>
                    <th>operations</th>

                </tr>

                @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->id_ingredient}}</td>
                        <td>{{$v->ingredient_name}}</td>
                        <td>
                            <a href="{{url('admin/ingredients/'.$v->id_ingredient.'/edit')}}">edit</a>
                            <a  onclick="delCate({{$v->id_ingredient}})">delete</a>
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
        function delCate(id_ingredient){
            layer.confirm('Are you sure to delete this ingredient?', {
                btn: ['yes','no'] //按钮
            }, function(){
                layer.confirm('Are you sure to delete all records about this ingredient?', {
                    btn: ['yes', 'no'] //按钮
                },function(){
                    //传异步参数
                    $.post("{{url('admin/ingredients/')}}/"+id_ingredient,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
