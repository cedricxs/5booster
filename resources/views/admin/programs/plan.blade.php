@extends('admin.index')
@section('container')

    <script type="text/javascript"> addTitle('program plan','{{url('admin/programs')}}')</script>
    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>program plan</h3>
        </div>
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">Objectif/Niveau</th>
                    @foreach($niveau as $n)
                        <th> {{$n->program_niveau_name}} </th>
                    @endforeach
                </tr>

                @foreach($object as $o)
                    <tr>
                        <td class="tc">{{$o->program_object_name}}</td>
                        @foreach($niveau as $n)
                            <td> <a href="{{url('admin/programscell?niveau=').$n->id_program_niveau.'&object='.$o->id_program_object}}">{{$count["$n->id_program_niveau".'_'."$o->id_program_object"]}} program view detail</a> </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>

        </div>
    </div>


@endsection
