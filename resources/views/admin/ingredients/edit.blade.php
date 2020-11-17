@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('ingredient','{{url('admin/ingredients')}}');
        addTitle('edit ingredient','{{url('admin/ingredients')."/$ingredient->id_ingredient/edit"}}');</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit ingredient</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/ingredients/create')}}"><i class="fa fa-plus"></i>add ingredient</a>
                <a href="{{url('admin/ingredients')}}"><i class="fa fa-recycle"></i>all ingredients</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/ingredients/'.$ingredient->id_ingredient)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>ingredient name：</th>
                    <td>
                        <input required type="text" class="lg" name="name" value="{{$ingredient->ingredient_name}}">
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
