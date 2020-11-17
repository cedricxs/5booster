@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program plan','{{url('admin/programs')}}');addTitle('program '+"{{$niveau->program_niveau_name.' '.$object->program_object_name}}",'{{url('admin/programscell').'?niveau='.$niveau->id_program_niveau."&object=".$object->id_program_object}}')</script>
    <div class="result_wrap">
        <div class="result_title">
            <h3>all programs {{$niveau->program_niveau_name.' '.$object->program_object_name}}</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>

        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/programs/create').'?niveau='.$niveau->id_program_niveau.'&object='.$object->id_program_object}}"><i class="fa fa-plus"></i>add program</a>
                <a href="{{url('admin/programscell').'?niveau='.$niveau->id_program_niveau.'&object='.$object->id_program_object}}"><i class="fa fa-recycle"></i>all programs</a>
            </div>
        </div>

    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>program name</th>
                    <th>niveau</th>
                    <th>object</th>
                    <th>video url</th>
                    <th>view</th>
                    <th>operations</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->id_program}}</td>
                    <td>{{$v->program_name}}</td>
                    <td>{{$niveau->program_niveau_name}}</td>
                    <td>{{$object->program_object_name}}</td>
                    <td>{{$v->program_video_url}}</td>
                    <td>{{$v->view}}</td>
                    <td>
                        <a href="{{url('admin/programs/'.$v->id_program.'/edit')}}">edit</a>
                        <a  onclick="delCate({{$v->id_program}})">delete</a>
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
    function delCate(id_program){
        layer.confirm('Are you sure to delete this program?', {
            btn: ['yes','no'] //按钮
        }, function(){
            //传异步参数
            $.post("{{url('admin/programs/')}}/"+id_program,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
