<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Bootstrap + Custom CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{--FontAwesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--Font--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <title>CryptoEpargne  - @yield('title')</title>
</head>
<body>

<!-- Fixed navbar -->
<nav  id="custom-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <div id="navbar" class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <?php
                        // Personne connecté
                        $me = isset($me) ? $me : "";
                    ?>
                    @if (Route::has('login'))
                        @auth
                            {{--Lien BackOffice en fonction du role--}}
                            @if($me[0]->role_id == 1)
                                <li><a href="{{ route('account.teacher') }}">Mon compte</a></li>
                            @else
                                <li><a href="{{ route('account.student') }}">Mon compte</a></li>
                            @endif
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw fa-power-off"></i> Se déconnecter
                                </a>
                                <form id="logout-form" action="http://192.168.10.10/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                            @endif
                </ul>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="wide">
    <div class="col-xs-5 line"></div>
    <div class="col-xs-2 logo"><img class="img-responsive" src="https://cryptoepargne.com/wp-content/uploads/2017/08/bitcoin.png" alt=""></div>
    <div class="col-xs-5 line"></div>
    <div class="container">
        @yield('slogan')
    </div>
    <div class="container" style="padding-top: 15%">
        @yield('content')
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#baseCurrencies').on('keyup', function () {
            var base = $(this).val();

            $.ajax({
                url: "{{URL::to('api/currencies')}}/"+base,
                method:"GET",
                data:{volume: base},
                dataType: 'json',
                success : function (response) {
                    if ( base == 0 ){
                        $('#gettingCurrencies').empty();
                        $('#gettingCurrencies').val("");
                    } else {
                        $('#gettingCurrencies').empty();
                        $('#gettingCurrencies').val(response.price);
                    }
                }
            });

        });

    });
</script>
</body>
</html>