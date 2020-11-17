@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program plan','{{url('admin/programs')}}');addTitle('program '+"{{$niveau->program_niveau_name.' '.$object->program_object_name}}",'{{url('admin/programscell').'?niveau='.$niveau->id_program_niveau."&object=".$object->id_program_object}}');addTitle('edit program '+"{{$niveau->program_niveau_name.' '.$object->program_object_name}}",
            '{{url('admin/programs/')."/$program->id_program"."/edit"}}')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit program</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/programs/create').'?niveau='.$niveau->id_program_niveau.'&object='.$object->id_program_object}}"><i class="fa fa-plus"></i>add program</a>
                <a href="{{url('admin/programscell').'?niveau='.$niveau->id_program_niveau.'&object='.$object->id_program_object}}"><i class="fa fa-recycle"></i>all programs</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/programs/'.$program->id_program)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>program name：</th>
                    <td>
                        <input type="text" class="lg" name="name" value="{{$program->program_name}}">
                    </td>
                </tr>
                <tr>
                    <th>program video url：</th>
                    <td>
                        <input type="text" class="lg" name="video_url" value="{{$program->program_video_url}}">
                    </td>
                </tr>
                <tr>
                    <th>Niveau：</th>
                    <td>
                        <select class="lg" name="niveau">
                            @foreach($all_niveau as $n)
                                <option value="{{$n->id_program_niveau}}" @if($n->id_program_niveau == $program->niveau)
                                selected
                                    @endif
                                >{{$n->program_niveau_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Object：</th>
                    <td>
                        <select class="lg" name="object">
                            @foreach($all_object as $o)
                                <option value="{{$o->id_program_object}}" @if($o->id_program_object == $program->object)
                                selected
                                    @endif
                                >{{$o->program_object_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr id="button_tr">
                    <th></th>
                    <td>
                        <input class="submit_programs" type="submit" value="submit">
                        <input class="submit_programs" type="button" class="back" onclick="history.go(-1)" value="return">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection

