@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('programme niveau','{{url('admin/niveau')}}');
        addTitle('add programme niveau','{{url('admin/niveau/create')}}')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>add niveau</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/niveau/create')}}"><i class="fa fa-plus"></i>add niveau</a>
                <a href="{{url('admin/niveau')}}"><i class="fa fa-recycle"></i>all niveau</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/niveau')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>programme niveau name：</th>
                    <td>
                        <input required type="text" class="lg" name="name">
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


