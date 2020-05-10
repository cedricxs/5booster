<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>5booster</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <script src="{{asset('/i18n/jquery.i18n.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.messagestore.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.fallbacks.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.language.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.parser.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.emitter.js')}}"></script>
    <script src="{{asset('/i18n/jquery.i18n.emitter.bidi.js')}}"></script>
</head>

<body>

    <!-- Header -->
    <header class="" id="header_connected">
        <!-- Bar de navigation -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-2">
            <a class="navbar-brand" href="{{url('/')}}">5Booster</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <select id="language" class="nav-link" style="border-width: 0px;background-color:rgba(0, 0, 0, 0)">
                            <option value ="fr">Française</option>
                            <option value ="en">English</option>
                            <option value ="zh-CN">中文</option>
                        </select>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="mon-Compte" class="nav-link" href="{{url('/client/espace')}}"></a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="mon-Abonnement" class="nav-link" href="{{url('/client/abonnement')}}"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/client/espace')}}">
                            <svg class="user-icon" viewBox="0 0 20 20">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Bar de navigation -->
    </header>
    <!-- Header -->


    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse flex-md-column">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a data-i18n="a-Propos" class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="Connexion" class="nav-link" href="#">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a data-i18n="mentions-Legales" class="nav-link" href="#">Mentions légales</a>
                    </li>
                </ul>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://5booster.com/">©5Booster 2020</a>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
    <!-- Footer -->

</body>
<script>
    let locale = navigator.language
    @if(request()->cookie('locale'))
        locale = '{{request()->cookie('locale')}}'
    @endif
    $.i18n().load({
        'fr' : '{{asset("languages/fr.json")}}',
        'en' : '{{asset("languages/en.json")}}',
        'zh-CN':'{{asset("languages/zh-CN.json")}}'
    }).done(function () {
        /*If the default locale was not set in any of these two ways, the library will try to get the language setting passed by the browser. Internally the default language is set to English. To avoid any unexpected behaviour it is recommended to set the default locale explicitly.*/
        updateLanguage(locale)
    })

    //console.log($.i18n().locale);
</script>
<script>
    $('#language').change(function (event) {
        lang = $('#language').val()
        updateLanguage(lang)
        post_language(lang)
    })
</script>
</html>
