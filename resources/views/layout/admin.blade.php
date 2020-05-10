<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('/font/css/font-awesome.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/admin.js')}}"></script>
    <script src="{{asset('js/poper.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <!--头部 开始-->
    <div class="top_box">
        <div class="top_left" id="top_left">

            <i class="fa fa-home"></i> <a href="{{url('admin')}}">Home</a>
        </div>
        <div class="top_right">
            <ul>
                <li>管理员：{{$admin->username}}</li>
                <li><a href="{{url('/password/reset')}}" >修改密码</a></li>
                <li><a href="{{url('/logout')}}">退出</a></li>
            </ul>
        </div>
    </div>
    <!--头部 结束-->
@yield('content')
</body>
<!-- Footer -->
<footer class="admin_footer">
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
</html>
