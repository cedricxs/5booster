@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('recette')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>add recette</h3>
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
        <form action="{{url('admin/recettes')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>recette title：</th>
                    <td>
                        <input type="text" class="lg" name="title">
                    </td>
                </tr>
                <tr>
                    <th>recette repas：</th>
                    <td>
                        <input type="text" class="lg" name="repas">
                    </td>
                </tr>
                <tr>
                    <th>recette diet：</th>
                    <td>
                        <input type="text" class="lg" name="diet">
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


