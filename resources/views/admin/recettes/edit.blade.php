@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('recette','{{url('admin/recettes')}}');
        addTitle('edit recette','{{url('admin/recettes')."/$recette->id_recette/edit"}}')</script>
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
        <form action="{{url('admin/recettes/'.$recette->id_recette)}}" method="post" enctype="multipart/form-data" onsubmit="return checkForm()">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>recette name：</th>
                    <td>
                        <input required type="text" class="lg" name="name" value="{{$recette->recette_name}}">
                    </td>
                </tr>
                <tr>
                    <th>recette image：</th>
                    <td>
                        <input  accept="image/*" onchange="changepic(this)" type="file" id="upload" class="inputfile" name="recette_img">
                        <img id="show" src="{{asset($recette->url_preview)}}" style="height: 150px;width: 250px"/>
                    </td>
                </tr>
                <tr>
                    <th>description：</th>
                    <td>
                        <textarea style="height: 30%;width: 63%" name="description">{{$recette->description}}</textarea>
                    </td>
                </tr>

                <tr id="tr_ingredient">
                    <th>ingredients：</th>
                    <td id="td_ingredient">
                        <input class="submit_workouts" type="button" value="add ingredient" onclick="addIngredient()"></input>
                        @for($i=0;$i<count($ingredients);$i++)
                            <div class="div_ingredient" id="{{'div_ingredient'.$i}}">
                                <span>{{'ingredient '.($i+1).' name:'}}&nbsp;&nbsp;&nbsp;</span>
                                <select class="lg" name="{{'ingredient[ingredient'.($i).'][id_ingredient]'}}">
                                    @foreach($all_ingredients as $all_ingredient)
                                        <option value="{{$all_ingredient->id_ingredient}}"
                                            @if($all_ingredient->id_ingredient == $ingredients[$i]->id_ingredient)
                                                selected
                                            @endif
                                        >{{$all_ingredient->ingredient_name}}</option>
                                    @endforeach
                                </select>
                                <span>{{'ingredient '.($i+1).' quantite:'}}&nbsp;&nbsp;&nbsp;</span>
                                <input onchange="check(this)" type="text" class="ingredient_quantite" style="width:20%" name="{{'ingredient[ingredient'.($i).'][quantite]'}}" value="{{$ingredients[$i]->quantite}}"/>
                                <input type="button" id="{{$i}}" class="submit_workouts" value="remove ingredient" onclick="removeIngredient(parseInt(this.id))"/>
                            </div>
                        @endfor
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
        <script>
            count = {{count($ingredients)}}
            function addIngredient() {
                let div = document.createElement('div');
                div.setAttribute('class','div_ingredient');
                div.setAttribute('id','div_ingredient'+count);
                let span = document.createElement('span');
                span.innerHTML  = 'ingredient '+(count+1)+' name:&nbsp;&nbsp;&nbsp;&nbsp;';
                let select = document.createElement('select');
                select.setAttribute('class','lg');
                select.setAttribute('name','ingredient[ingredient'+count+'][id_ingredient]');
                @foreach($all_ingredients as $all_ingredient)
                    option = document.createElement('option');
                    option.text = '{{$all_ingredient->ingredient_name}}';
                    option.setAttribute('value','{{$all_ingredient->id_ingredient}}');
                    select.appendChild(option);
                    @endforeach
                let span2 = document.createElement('span');
                span2.innerHTML  = '&nbsp;ingredient '+(count+1)+' quantite:&nbsp;&nbsp;&nbsp;&nbsp;';
                let input = document.createElement('input');
                input.setAttribute('type','text');
                input.setAttribute('class','ingredient_quantite');
                input.setAttribute('name','ingredient[ingredient'+count+'][quantite]');
                input.setAttribute('style','width:20%');
                input.setAttribute('onchange','check(this)');
                let button = document.createElement('input');
                button.setAttribute('type','button');
                button.setAttribute('id',''+count);
                button.setAttribute('class','submit_workouts');
                button.setAttribute('value','remove ingredient');
                button.setAttribute('onclick','removeIngredient(parseInt(this.id))');
                button.setAttribute('style','position:relative;left:4px');
                div.appendChild(span);
                div.appendChild(select);
                div.appendChild(span2);
                div.appendChild(input);
                div.appendChild(button);
                document.getElementById('td_ingredient').appendChild(div);
                count++;
            }
        </script>
    </div>
@endsection

