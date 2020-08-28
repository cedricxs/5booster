@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program')</script>
    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>add workout</h3>
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
                    <th>workout title：</th>
                    <td>
                        <input type="text" class="lg" name="title">
                    </td>
                </tr>
                <tr>
                    <th>workout type：</th>
                    <td>
                        <select class="lg" name="type">
                            <option value="cardio">Cardio</option>
                            <option value="strength">Strength</option>
                            <option value="power">Power</option>
                            <option value="function">Function</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>workout focus：</th>
                    <td>
                        <select class="lg" name="focus">
                            <option value="upper-body">Upper body</option>
                            <option value="core">Core</option>
                            <option value="lower-body">Lower body</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>workout difficulty：</th>
                    <td>
                        <select class="lg" name="difficulty">
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
                {{--                        <textarea name="keywords"></textarea>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                {{--                <tr>--}}
                {{--                    <th>description：</th>--}}
                {{--                    <td>--}}
                {{--                        <textarea name="description"></textarea>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}

{{--                <tr>
                    <th>upload file: </th>
                    <td>
                        <input type="file" id="upload" name="workout" multiple="multiple"/>
                    </td>
                </tr>--}}
                <tr>
                    <th>Nombre d'exercice: </th>
                    <td>
                        <input id="nb_exercice" name="nb_exercice" type="text" class="lg"/>
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
        $('#nb_exercice').change(function () {
            count = $('.row').length
            if($('#nb_exercice').val()>count){
                addExInput($('#nb_exercice').val()-count,count)
            }else if($('#nb_exercice').val()<count){
                let ans = confirm('sure?');
                if(ans == true){
                    for(let i=Number($('#nb_exercice').val());i<count;i++){
                        $('#exercice'+(i+1)).remove()
                    }
                }else{
                    $('#nb_exercice').val(count)
                }
            }
        })
        /*    <div class="btn btn-outline-info waves-effect btn-sm float-left">
      <span>Choose files</span>
      <input type="file" multiple>
    </div>*/
        function addExInput(nb_exercice,count) {
            let tb = $('tbody');
            for(let i = 0;i<nb_exercice;i++){
                let tr = $('<tr id="exercice'+(i+1+count)+'"></tr>');
                let th = $('<th>Exercice '+(i+1+count)+'</th>').appendTo(tr);
                let td = $('<td></td>').appendTo(tr);
                let divrow = $('<div id="div_exercice'+(i+1+count)+'" class="row"></div>').appendTo(td)
                let divcol1 = $('<div class="file" id="img_exercice_div'+(i+1+count)+'1"><l>Chose File</l></div>').appendTo(divrow);
                let input = $('<input class="exercice_img" name="exercice_img'+(i+1+count)+'1" type="file"/>').appendTo(divcol1)
                let divcol2 = $('<div class="column" id="addImg_exercice_button_div'+(i+1+count)+'"></div>').appendTo(divrow);
                let button = $('<button type="button" id="addImg_exercice_button'+(i+1+count)+'" class="btn btn-default btn-sm">' +
                    '<span class="glyphicon glyphicon-plus"></span> Plus' +
                    '</button>').appendTo(divcol2)
                tr.insertBefore($('#button_tr'));
                button.click(addImg)
                input.change(updateFile);
            }
        }
        function updateFile(event){
            let input = event.target
            let file = input.files[0].name;
            if(file.length>10){
                file = file.substr(0,4)+"... "+file.substr(file.length-4,4);
            }
            let index_name = input.getAttribute('name')
            let row = index_name[index_name.length-2]
            let col = index_name[index_name.length-1]
            console.log(row+' '+col)
            $('#div_exercice'+row).children('#img_exercice_div'+row+col).children('l').text(file)
        }
        function addImg(event) {
            let div = event.target;
            let index = div.id[div.id.length-1];
            let divrow = $('#div_exercice'+index);
            let len = divrow.children('div').length-1;
            let divcol = $('<div class="file" id="img_exercice_div'+index+(len+1)+'">Chose File</div>').insertBefore($('#addImg_exercice_button_div'+index));
            let input = $('<input class="exercice_img" name="exercice_img'+index+(len+1)+'"type="file"/>').appendTo(divcol);
            input.change(updateFile);
        }

       /* function drop(e) {
            console.log('asd')
            e.stopPropagation();
            e.preventDefault();
            var dt = e.dataTransfer;
            console.log(dt)
            var files = dt.files;

            console.log(files)
            handleFiles(files);
        }
        function dragenter(e) {
            e.stopPropagation();
            e.preventDefault();
        }

        function dragover(e) {
            e.stopPropagation();
            e.preventDefault();
        }
        function handleFiles(files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /^image\//;

                if (!imageType.test(file.type)) {
                    continue;
                }

                let preview = document.getElementById('dropbox');
                var img = document.createElement("img");
                img.file = file;
                img.setAttribute('style','width:100px;height:100px')
                preview.appendChild(img); // 假设"preview"就是用来显示内容的div
                var reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }
        }
        let dropbox;
        dropbox = document.getElementById("dropbox");
        dropbox.addEventListener("drop", drop, false);
        dropbox.addEventListener("dragover", dragover, false);
        dropbox.addEventListener("drop", drop, false);*/
    </script>
@endsection


