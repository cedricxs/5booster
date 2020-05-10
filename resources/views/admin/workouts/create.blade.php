@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('workout')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>add workout</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif

                </div>

            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/workouts/create')}}"><i class="fa fa-plus"></i>add workout</a>
                <a href="{{url('admin/workouts')}}"><i class="fa fa-recycle"></i>all workouts</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/workouts')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>workout title：</th>
                    <td>
                        <input type="text" class="lg" name="title">
                    </td>
                </tr>
                <tr>
                    <th>workout type：</th>
                    <td>
                        <input type="text" class="lg" name="type">
                    </td>
                </tr>
                <tr>
                    <th>workout focus：</th>
                    <td>
                        <input type="text" class="lg" name="focus">
                    </td>
                </tr>
                <tr>
                    <th>workout difficulty：</th>
                    <td>
                        <input type="text" class="lg" name="difficulty">
                    </td>
                </tr>
{{--                <tr>--}}
{{--                    <th>keywords：</th>--}}
{{--                    <td>--}}
{{--                        <textarea name="keywords"></textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>description：</th>--}}
{{--                    <td>--}}
{{--                        <textarea name="description"></textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}

                <tr>
                    <th>upload file: </th>
                    <td>
                        <input type="file" id="upload" name="workout" />
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input class="submit_workouts" type="submit" value="submit">
                        <input class="submit_workouts" type="button" onclick="history.go(-1)" value="return">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection

