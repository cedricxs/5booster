@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('category')</script>
    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all categories</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/categories/create')}}"><i class="fa fa-plus"></i>add category</a>
                <a href="{{url('admin/categories')}}"><i class="fa fa-recycle"></i>all categories</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>sport category name</th>
                    <th>operations</th>

                </tr>

                @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->id_sport_category}}</td>
                        <td>{{$v->sport_category_name}}</td>
                        <td>
                            <a href="{{url('admin/categories/'.$v->id_sport_category.'/edit')}}">edit</a>
                            <a  onclick="delCate({{$v->id_sport_category}})">delete</a>
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
        function delCate(category_id){
            layer.confirm('Are you sure to delete this category?', {
                btn: ['yes','no'] //按钮
            }, function(){
                //传异步参数
                $.post("{{url('admin/categories/')}}/"+category_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
