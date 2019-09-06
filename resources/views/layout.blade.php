<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SSpotify')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body style="padding-top: 40px">
    <div id="topContainer">
        <div id="navBarContainer">
            @include('layouts.navBar')
        </div>
        <div id="contentContainer">
            @yield('content')
        </div>
    </div>
    <div id="bottomContainer">
	   @include('layouts.nowPlayingBar')
    </div> 
	
</body>
</html>