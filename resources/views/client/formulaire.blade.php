@extends('layout.slider')
@section('container')
@if($has_submit_questionnaire && !$redo_questionnaire)
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;left: 30%;top:10%">
        <div class="card-header">5Booster</div>
        <div class="card-body">
            <h5 data-i18n="success-submit-questionnaire" class="card-title"></h5>
            <p data-i18n="wait-further-information" class="card-text"></p>
            <a data-i18n="click-here-redo-questionnaire" href="{{url('client/reset_questionnaire')}}" style="color: #0056b3"><p class="card-text"></p></a>
        </div>
    </div>
@else
    <form id="form_questionnaire">
    <div id="questionnaire">
    <!-- Première question -->
    <div class="card" id="question">
        <p class="question_title">Pratiques-tu une activité physique ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_1" id="answer_1_question_1" value="1">
            <label class="form-check-label" for="question_1">
                Oui
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_1" id="answer_2_question_1" value="2">
            <label class="form-check-label" for="question_1">
                Non
            </label>
        </div>
    </div>

    <!-- Seconde question -->
    <div class="card" id="question">
        <p class="question_title">A quelle fréquence ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_2" id="answer_1_question_2" value="1">
            <label class="form-check-label" for="question_2">
                Plus d'une fois par mois
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_2" id="answer_1_question_2" value="2">
            <label class="form-check-label" for="question_2">
                Plus d'une fois par semaine
            </label>
        </div>
    </div>

    <!-- Troisème question -->
    <div class="card" id="question">
        <p class="question_title">A quel niveau pratiques-tu cette activité ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_3" id="answer_1_question_3" value="1">
            <label class="form-check-label" for="question_3">
                Compétition club
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_3" id="answer_2_question_3" value="2">
            <label class="form-check-label" for="question_3">
                Compétition scolaire et universitaire
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_3" id="answer_3_question_3" value="3">
            <label class="form-check-label" for="question_3">
                Représentation spectacle
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_3" id="answer_4_question_3" value="4">
            <label class="form-check-label" for="question_3">
                Loisir et Bien être
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_3" id="answer_5_question_3" value="5">
            <label class="form-check-label" for="question_3">
                Entretien pour garder la forme
            </label>
        </div>
    </div>

    <!-- Quatrième question -->
    <div class="card" id="question">
        <p class="question_title">Quel type d’activité ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_1_question_4" value="1">
            <label class="form-check-label" for="question_4">
                Sport artistique (danse, gymnastique rythmique)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_2_question_4" value="2">
            <label class="form-check-label" for="question_4">
                Sport athlétique (natation, callisthénie)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_3_question_4" value="3">
            <label class="form-check-label" for="question_4">
                Sport aquatique
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_4_question_4" value="4">
            <label class="form-check-label" for="question_4">
                Sport collectif (hockey, basket, handball)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_5_question_4" value="5">
            <label class="form-check-label" for="question_4">
                Sport de raquette
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_6_question_4" value="6">
            <label class="form-check-label" for="question_4">
                Sport de glisse (surf, roller, skate)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_7_question_4" value="7">
            <label class="form-check-label" for="question_4">
                Sport de combat
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_8_question_4" value="8">
            <label class="form-check-label" for="question_4">
                Sport de pleine nature (rando, escalade, kayak)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_9_question_4" value="9">
            <label class="form-check-label" for="question_4">
                Fitness/Musculation
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_4" id="answer_10_question_4" value="10">
            <label class="form-check-label" for="question_4">
                Yoga / Pilate / Aérobie
            </label>
        </div>
    </div>

    <!-- Cinquième question -->
    <div class="card" id="question">
        <p class="question_title">As-tu pratiqué du sport plus jeune ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_5" id="answer_1_question_5" value="1">
            <label class="form-check-label" for="question_5">
                Oui
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_5" id="answer_2_question_5" value="2">
            <label class="form-check-label" for="question_5">
                Non
            </label>
        </div>
    </div>

    <!-- Sixième question -->
    <div class="card" id="question">
        <p class="question_title">A quel niveau as-tu pratiqué ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_6" id="answer_1_question_6" value="1">
            <label class="form-check-label" for="question_6">
                Compétition club
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_6" id="answer_2_question_6" value="2">
            <label class="form-check-label" for="question_6">
                Compétition scolaire et universitaire
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_6" id="answer_3_question_6" value="3">
            <label class="form-check-label" for="question_6">
                Représentation spectacle
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_6" id="answer_4_question_6" value="4">
            <label class="form-check-label" for="question_6">
                Loisir et Bien être
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_6" id="answer_5_question_6" value="5">
            <label class="form-check-label" for="question_6">
                Entretien pour garder la forme
            </label>
        </div>
    </div>

    <!-- Septième question -->
    <div class="card" id="question">
        <p class="question_title">Quel type d'activité ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_1_question_7" value="1">
            <label class="form-check-label" for="question_7">
                Sport artistique (danse, gymnastique rythmique)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_2_question_7" value="2">
            <label class="form-check-label" for="question_7">
                Sport athlétique (natation, callisthénie)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_3_question_7" value="3">
            <label class="form-check-label" for="question_7">
                Sport aquatique
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_4_question_7" value="4">
            <label class="form-check-label" for="question_7">
                Sport collectif (hockey, basket, handball)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_5_question_7" value="5">
            <label class="form-check-label" for="question_7">
                Sport de raquette
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_6_question_7" value="6">
            <label class="form-check-label" for="question_7">
                Sport de glisse (surf, roller, skate)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_7_question_7" value="7">
            <label class="form-check-label" for="question_7">
                Sport de combat
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_8_question_7" value="8">
            <label class="form-check-label" for="question_7">
                Sport de pleine nature (rando, escalade, kayak)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_9_question_7" value="9">
            <label class="form-check-label" for="question_7">
                Fitness/Musculation
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_7" id="answer_10_question_7" value="10">
            <label class="form-check-label" for="question_7">
                Yoga / Pilate / Aérobie
            </label>
        </div>
    </div>

    <!-- Huitième question -->
    <div class="card" id="question">
        <p class="question_title">Combien d'années as-tu pratiqué ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_8" id="answer_1_question_8" value="1">
            <label class="form-check-label" for="question_8">
                1 - 2 ans
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_8" id="answer_2_question_8" value="2">
            <label class="form-check-label" for="question_8">
                3 - 5 ans
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_8" id="answer_3_question_8" value="3">
            <label class="form-check-label" for="question_8">
                + 5 ans
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_8" id="answer_4_question_8" value="4">
            <label class="form-check-label" for="question_8">
                + 10 ans
            </label>
        </div>
    </div>

    <!-- Neuvième question -->
    <div class="card" id="question">
        <p class="question_title">Quelle est ta motivation ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_9" id="answer_1_question_9" value="1">
            <label class="form-check-label" for="question_9">
                Être mieux dans ma peau
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_9" id="answer_2_question_9" value="2">
            <label class="form-check-label" for="question_9">
                Santé hygiène de vie
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_9" id="answer_3_question_9" value="3">
            <label class="form-check-label" for="question_9">
                Retrouver de l'énergie
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_9" id="answer_4_question_9" value="4">
            <label class="form-check-label" for="question_9">
                Grâce à des amis
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_9" id="answer_5_question_9" value="5">
            <label class="form-check-label" for="question_9">
                Recommendations 5booster
            </label>
        </div>
    </div>


    <!-- Dixième question -->
    <div class="card" id="question">
        <p class="question_title">As-tu des problèmes de santé ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_1_question_10" value="1">
            <label class="form-check-label" for="question_10">
                Aucun
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_2_question_10" value="2">
            <label class="form-check-label" for="question_10">
                Cardiaque
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_3_question_10" value="3">
            <label class="form-check-label" for="question_10">
                Diabète
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_4_question_10" value="4">
            <label class="form-check-label" for="question_10">
                Musculation
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_5_question_10" value="5">
            <label class="form-check-label" for="question_10">
                Osseux
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_10" id="answer_6_question_10" value="6">
            <label class="form-check-label" for="question_10">
                Respiratoire
            </label>
        </div>
    </div>

    <!-- Onsième question  -->
    <div class="card" id="question">
        <p class="question_title">As-tu déjà été blessé ?</p>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_1_question_11" value="1">
            <label class="form-check-label" for="question_11">
                Non, jamais
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_2_question_11" value="2">
            <label class="form-check-label" for="question_11">
                Articulation cheville
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_3_question_11" value="3">
            <label class="form-check-label" for="question_11">
                Articulation genou
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_4_question_11" value="4">
            <label class="form-check-label" for="question_11">
                Articulation épaule
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_5_question_11" value="5">
            <label class="form-check-label" for="question_11">
                Articulation coude
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_6_question_11" value="6">
            <label class="form-check-label" for="question_11">
                Colonne vertébrale
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_7_question_11" value="7">
            <label class="form-check-label" for="question_11">
                Muscles des jambes
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_8_question_11" value="8">
            <label class="form-check-label" for="question_11">
                Muscles du dos
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_9_question_11" value="9">
            <label class="form-check-label" for="question_11">
                Muscles de la poitrine
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_11" id="answer_10_question_11" value="10">
            <label class="form-check-label" for="question_11">
                Muscle des bras
            </label>
        </div>
    </div>

    <!-- Douzième question -->
    <div class="card" id="question">
        <p class="question_title">As-tu récupéré de ta blessure ?</p>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_12" id="answer_1_question_12" value="1">
            <label class="form-check-label" for="question_12">
                Oui
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_12" id="answer_1_question_12" value="2">
            <label class="form-check-label" for="question_12">
                Non
            </label>
        </div>
    </div>

    <!-- Treizième question -->
    <div class="card" id="question">
        <p class="question_title">Quel est ton objectif personnel ?</p>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_13" id="answer_1_question_13" value="1">
            <label class="form-check-label" for="question_13">
                Se dépenser, défouler
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_13" id="answer_2_question_13" value="2">
            <label class="form-check-label" for="question_13">
                Perdre du poids et construire du muscle
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="question_13" id="answer_3_question_13" value="3">
            <label class="form-check-label" for="question_13">
                Développer sa force musculaire
            </label>
        </div>
    </div>

        <input class="btn btn-primary" id="submit" type="button" value="Submit" style="margin: 10px;position:relative;left: 35%;width: 20%">
    </div>
        <script>
            questions = document.getElementsByClassName('card');
            for(let i=0;i<questions.length;i++)
            {
                let question = questions.item(i)
                let inputs = question.getElementsByClassName('form-check-input')
                for(let j=0;j<inputs.length;j++){
                    let input = inputs.item(j)
                    let name = input.getAttribute('name')
                    let value = input.getAttribute('value')
                    input.addEventListener('click',function (event) {
                        let data = {}
                        data[name] = value
                        question.setAttribute('style','border-left-color:#4285f4')
                        $.ajax({
                            type:'POST',
                            url:'{{url("client/questionnaire")}}',
                            data:data,
                            success:function (res) {
                                console.log(res)
                            },
                            error:function (err) {
                                console.log(err)
                            }
                        })
                    })
                }

            }
        </script>
{{--        unload 和 beforeunload 都没法区分刷新和关闭，只要当前页面 unload 了就会触发（关闭，刷新，点击链接，输入地址等等）--}}

{{--        unload 可以做些清理工作，但是不能用 preventDefault 来阻止页面关闭。（jquery unload )--}}

{{--        alert 实际执行了，只是大部分浏览器会阻止正在关闭的窗口弹对话框。如果你用 chrome，可以打开 Developer Tool 并点击右下角的齿轮设置，选择 Preserve log upon navigation，可以查看到 unload 里的 console.log。因为 unload 一返回，页面就关闭，如果有 ajax 请求什么的，都一定要同步调用（async:false），不然页面 unload 完资源就全部注销了。--}}

{{--        beforeunload 如果返回值不是 null 或者 undefined，浏览器会负责跳出个 confirm 对话框，返回值可以会做为提示的一部份也可能压根就不用。--}}
        <script>
            function post_questionnaire(){
                let data = $('form').serialize()
                if(data == '')return false
                console.log(data)
                $.ajax({
                    url:"{{url('/client/questionnaire')}}",
                    method:'POST',
                    data:data,
                    async:true,
                    dataType:'json',
                    success:function (res) {
                        console.log(res)
                    },
                    error:function (err) {
                        console.log(err)
                    }
                })
            }
            // window.onbeforeunload = function(){
            //     post_questionnaire()
            //     return 'wait for post'
            // }
            $('#submit').click(function (event) {
                /*post_questionnaire()*/
                window.location.href = '{{url('client/formulaire')}}'
            })
        </script>
    </form>
    @if($redo_questionnaire)
        <script>
            @foreach($all_posts as $post)
                inputs = document.getElementsByName('question_'+'{{$post->question_id}}')
                for(let i=0;i<inputs.length;i++){
                    let input = inputs.item(i)
                    if(input.getAttribute('value')=='{{$post->answer}}'){
                        input.setAttribute('checked','checked')
                        input.parentElement.parentElement.setAttribute('style','border-left-color:#4285f4')
                    }
                }
            @endforeach
        </script>
    @endif
@endif
@endsection
