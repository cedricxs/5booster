<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
</head>

  <body>
    <!-- Header-->
    <header>
        <!-- Navigation navbar -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-2" id="nav">
            <a class="navbar-brand" href="{{ url('/') }}">5Booster</a>
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
                        <a class="nav-link" href="#">@lang('message.blog')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/history') }}">@lang('message.our-history')<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('message.contact-us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">@lang('message.inscription')</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navigation navbar -->
    </header>
    <!-- Header-->

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class=" navbar-collapse flex-md-column">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('message.a-Propos')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('message.connexion')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('message.mentions-Legales')</a>
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
    $("#language").val('{{App::getLocale()}}')
    $("#language").change(function (event) {
        $.ajax({
            type:'POST',
            url:'{{asset("/api/change_locale")}}',
            data:{locale:$("#language").val()},
            success:function (res) {
                console.log(res)
                location.reload()
            },
            error:function (err) {
                console.log(err)
            }
        })
    })
</script>
</html>
