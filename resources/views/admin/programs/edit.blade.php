@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit workout</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/programs/create')}}"><i class="fa fa-plus"></i>add workout</a>
                <a href="{{url('admin/programs')}}"><i class="fa fa-recycle"></i>all workouts</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/programs/'.$workout->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>title：</th>
                    <td>
                        <input type="text" class="lg" name="title" value="{{$workout->title}}">
                    </td>
                </tr>
                <tr>
                    <th>type：</th>
                    <td>
                        <select class="lg" name="type" id="select_type">
                            <option value="cardio">Cardio</option>
                            <option value="strength">Strength</option>
                            <option value="power">Power</option>
                            <option value="function">Function</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>focus：</th>
                    <td>
                        <select class="lg" name="focus" id="select_focus">
                            <option value="upper-body">Upper body</option>
                            <option value="core">Core</option>
                            <option value="lower-body">Lower body</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>difficulty：</th>
                    <td>
                        <select class="lg" name="difficulty" id="select_difficulty">
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                            <option value="expert">Expert</option>
                        </select>
                    </td>
                </tr>
{{--                <tr>--}}
{{--                    <th>keywords：</th>--}}
{{--                    <td>--}}
{{--                        <textarea name="keywords"v>{{$workout->keywords}}</textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>description：</th>--}}
{{--                    <td>--}}
{{--                        <textarea name="description" >{{$workout->description}}</textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}
                <tr>
                    <th>update file: </th>
                    <td>
                        <input type="file" id="upload" name="workout" />
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
    <script>
        $("#select_type").val("{{$workout->type}}");
        $("#select_focus").val("{{$workout->focus}}");
        $("#select_difficulty").val("{{$workout->difficulty}}");
    </script>
@endsection

