@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('code promo','{{url('admin/codepromos')}}')</script>
    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all code promos</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/codepromos/create')}}"><i class="fa fa-plus"></i>add code promo</a>
                <a href="{{url('admin/codepromos')}}"><i class="fa fa-recycle"></i>all code promos</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>association name</th>
                    <th>code promo</th>
                    <th>number left</th>
                    <th>operations</th>

                </tr>

                @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->id_codepromo}}</td>
                        <td>{{$v->asso_name}}</td>
                        <td>{{$v->code}}</td>
                        <td>{{$v->number}}</td>
                        <td>
                            <a href="{{url('admin/codepromos/'.$v->id_codepromo.'/edit')}}">edit</a>
                            <a  onclick="delCate({{$v->id_codepromo}})">delete</a>
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
        function delCate(id_codepromo){
            layer.confirm('Are you sure to delete this code promo?', {
                btn: ['yes','no'] //按钮
            }, function(){
                //传异步参数
                $.post("{{url('admin/codepromos/')}}/"+id_codepromo,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
