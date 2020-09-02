@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('category')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit category</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/categories/create')}}"><i class="fa fa-plus"></i>add category</a>
                <a href="{{url('admin/categories')}}"><i class="fa fa-recycle"></i>all categories</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/categories/'.$category->id_sport_category)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>sport category name：</th>
                    <td>
                        <input required type="text" class="lg" name="title" value="{{$category->sport_category_name}}">
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

