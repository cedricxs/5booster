@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>add program</h3>
            @if(session('msg'))
                <div class="mark">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/programs/create')}}"><i class="fa fa-plus"></i>add program</a>
                <a href="{{url('admin/programs')}}"><i class="fa fa-recycle"></i>all programs</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/programs')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>week number：</th>
                    <td>
                        <input required type="text" class="lg" name="week_number">
                    </td>
                </tr>
                <tr>
                    <th>program category：</th>
                    <td>
                        <select class="lg" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id_sport_category}}">{{$category->sport_category_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>program pdf：</th>
                    <td>
                        <input type="file" class="lg" name="pdf">
                    </td>
                </tr>
                <tr>
                    <th>is Free：</th>
                    <td>
                        <input type="checkbox" id="free" name="free"
                               >
                    </td>
                </tr>

{{--                <tr>
                    <th>upload file: </th>
                    <td>
                        <input type="file" id="upload" name="workout" multiple="multiple"/>
                    </td>
                </tr>--}}
                <tr>
                    <th>Nombre d'exercice: </th>
                    <td>
                        <input id="nb_exercise" name="nb_exercise" type="text" class="lg" value="0"/>
                    </td>
                </tr>
{{--                <tr>
                    <th>upload image: </th>
                    <td>
                        <div id="dropbox"  draggable="true" style="width: 20%;height: 200px;">
Drop Files to here
                        </div>
                    </td>
                </tr>--}}
                <tr id="button_tr">
                    <th></th>
                    <td>
                        <input class="submit_programs" type="submit" value="submit">
                        <input class="submit_programs" type="button" onclick="history.go(-1)" value="return">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
        $('#nb_exercise').change(function () {
            let count = $('.row').length
            if($('#nb_exercise').val()>count){
                addExInput($('#nb_exercise').val()-count,count)
            }else if($('#nb_exercise').val()<count){
                let ans = confirm('sure?');
                if(ans == true){
                    for(let i=Number($('#nb_exercise').val());i<count;i++){
                        $('#exercise'+(i+1)).remove()
                    }
                }else{
                    $('#nb_exercise').val(count)
                }
            }
        })

        function addExInput(nb_exercise,count) {
            for(let i = 0;i<nb_exercise;i++){
                let tr = $('<tr id="exercise'+(i+1+count)+'"></tr>');
                let th = $('<th>Exercise '+(i+1+count)+'</th>').appendTo(tr);
                let td = $('<td class="row"><input required style="width: 20%;position:relative;left: 1.5%" type="text" class="lg" name="exercise_name_'+(i+1+count)+'" placeholder="exercise name"><input required style="width: 42%;position:relative;left: 2%" type="text" class="lg" name="exercise_video_url_'+(i+1+count)+'" placeholder="exercise video url"></td>').appendTo(tr);

                tr.insertBefore($('#button_tr'));
            }
        }



    </script>
@endsection


