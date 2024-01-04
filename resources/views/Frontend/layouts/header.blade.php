<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Artist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/slick-theme.css') }}" />
    <link href="{{ asset('common.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/slick.css') }}" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('Frontend/js/slick.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/custom.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoKHpwyIol5ZIcQueYSKF7SFz98fJkwo4&libraries=places">
    </script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <style>
        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }

        footer {
        background-color: #555;
        color: white;
        padding: 15px;
        }

        .icon-size{
        font-size:25px;
        padding:5px;
        color:#fff;
        }
        .footer-p{
        padding:0px 25px;
        }
        .mt-10{
            margin-top:10px;
        } 
        .logo{
          height:80px !important;
          width:80px !important;
        }
        #myNavbar{
          height: 95px !important;
        }
        .navbar-inverse{
          border-radius:0px;
        }
        @media screen and (max-width:500px) {
          .logo{
            height:40px !important;
            width :40px !important;
          }
          #myNavbar{
          height: 45px !important;
        }

        }
    </style>

    @yield('extra_css')

</head>

<body>
    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif"
            alt="processing..." />
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="{{ route('shop') }}" style="padding: 10px 15px">
                <img src="{{ asset('Frontend/images/artist_logo.png') }}" class="artist_logo logo">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <!-- <ul class="nav navbar-nav">
              <li class="active"><a href="{{route('shop')}}">Home</a></li>
              <li><a href="#">Messages</a></li>
            </ul> -->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{route('login')}}">Artist Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
        
    <section class="main-section">
