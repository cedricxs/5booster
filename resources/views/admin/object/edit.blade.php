@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('programme object','{{url('admin/object')}}');
        addTitle('edit programme object','{{url('admin/object')."/$object->id_program_object/edit"}}')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit object</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/object/create')}}"><i class="fa fa-plus"></i>add object</a>
                <a href="{{url('admin/object')}}"><i class="fa fa-recycle"></i>all object</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/object/'.$object->id_program_object)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>program object name：</th>
                    <td>
                        <input required type="text" class="lg" name="name" value="{{$object->program_object_name}}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input class="submit_workouts" type="submit" value="submit">
                        <input class="submit_workouts" type="button" class="back" onclick="history.go(-1)" value="return">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection
