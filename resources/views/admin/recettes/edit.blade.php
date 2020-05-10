@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('recette')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit recette</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/recettes/create')}}"><i class="fa fa-plus"></i>add recette</a>
                <a href="{{url('admin/recettes')}}"><i class="fa fa-recycle"></i>all recettes</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/recettes/'.$recette->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>title：</th>
                    <td>
                        <input type="text" class="lg" name="title" value="{{$recette->title}}">
                    </td>
                </tr>
                <tr>
                    <th>type：</th>
                    <td>
                        <input type="text" class="lg" name="repas" value="{{$recette->repas}}">
                    </td>
                </tr>
                <tr>
                    <th>focus：</th>
                    <td>
                        <input type="text" class="lg" name="diet" value="{{$recette->diet}}">
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
                        <input type="file" id="upload" name="recette" />
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

