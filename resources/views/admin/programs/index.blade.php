@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program')</script>
<!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>all programs</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/programs/create')}}"><i class="fa fa-plus"></i>add program</a>
                <a href="{{url('admin/programs')}}"><i class="fa fa-recycle"></i>all programs</a>
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

        <div class="btn-group" id="category">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{'Category:'.$contrainte_category}}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('category','All')">All</a>
                @foreach($categories as $category)
                    <a class="dropdown-item" href="javascript:void(0)" onclick="updateHref('category','{{$category->sport_category_name}}')">{{$category->sport_category_name}}</a>
                @endforeach
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>week number</th>
                    <th>category</th>
                    <th>free</th>
                    <th>view</th>
                    <th>operations</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->id_week_program}}</td>
                    <td>{{$v->week_number}}</td>
                    <td>{{$v->category->sport_category_name}}</td>
                    <td>{{$v->free==1?'yes':'no'}}</td>
                    <td>{{$v->view}}</td>
                    <td>
                        <a href="{{url('admin/programs/'.$v->id_week_program.'/edit')}}">edit</a>
                        <a  onclick="delCate({{$v->id_week_program}})">delete</a>
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
    function delCate(id_week_program){
        layer.confirm('Are you sure to delete this workout?', {
            btn: ['yes','no'] //按钮
        }, function(){
            //传异步参数
            $.post("{{url('admin/programs/')}}/"+id_week_program,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
