@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('code promo','{{url('admin/codepromos')}}')
        addTitle('edit code promo','{{url('admin/codepromos')."/$codepromo->id_codepromo/edit"}}')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>edit code promo</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/codepromos/create')}}"><i class="fa fa-plus"></i>add code promo</a>
                <a href="{{url('admin/codepromos')}}"><i class="fa fa-recycle"></i>all code promos</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/codepromos/'.$codepromo->id_codepromo)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>association name：</th>
                    <td>
                        <input required type="text" class="lg" name="asso" value="{{$codepromo->asso_name}}">
                    </td>
                </tr>
                <tr>
                    <th>code promo：</th>
                    <td>
                        <input required type="text" class="lg" name="code" value="{{$codepromo->code}}">
                    </td>
                </tr>
                <tr>
                    <th>number left：</th>
                    <td>
                        <input required type="number" class="lg" name="number" value="{{$codepromo->number}}">
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

