<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <style>
        .nav {
            padding: 10px;
            background-color:#5571ec !important;
            margin:0px 0px 10px 0px !important;
        }

        .footer{
            min-height:200px;
            padding: 10px;
            background-color:#5571ec !important;
            margin:100px 0px 0px 0px !important;
        }
        
        body {
            display: flex !important;
            min-height: 100vh !important;
            flex-direction: column !important;
        }

        main {
            flex: 1 0 auto !important;
        }
    </style>
</head>
<body>
        <nav>
            <div class="ui secondary menu nav">
                <a href="/" class="active item">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a href="/trabajos" class="item">
                    Trabajos
                </a>
                <a href="/contacto" class="item">
                    Contacto
                </a>
                <div class="right menu">
                    <div class="item">
                        <div class="ui icon input">
                            <input type="text" placeholder="Search...">
                            <i class="search link icon"></i>
                        </div>
                    </div>
                    @guest
                    <a class="item">
                        Administrar
                    </a>
                    @else
                    <a class="ui item">
                        Logout
                    </a>
                    @endguest
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            este es mi footer
        </footer>
</body>
</html>
