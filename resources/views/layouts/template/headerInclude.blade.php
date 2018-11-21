<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Document Meta
        ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}



<!--IE Compatibility Meta-->
    <meta name="author" content="zytheme"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
          content="Whole is a pixel perfect creative multi purpose html5 tempalte  based on designed with great attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout">
    <link href="{{asset('images/favicon/favicon.png')}}" rel="icon">

    <!-- Fonts
        ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CDroid+Serif:400,400i,700,700i'
          rel='stylesheet' type='text/css'>

    <!-- Stylesheets
        ============================================= -->
    <link href="{{asset('css/external.css')}}" rel="stylesheet">
    {{--<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/select2-bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset("revolution/css/settings.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("revolution/css/layers.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("revolution/css/navigation.css")}}">






    <link rel="stylesheet" href="{{asset("bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css")}}" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.

    -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Document Title
        ============================================= -->
    <title>Whole | Multi-purpose Business Html5 Template</title>
</head>
<body>

<div class="preloader">
    <div class="spinner">
        <div class="bounce1">
        </div>
        <div class="bounce2">
        </div>
        <div class="bounce3">
        </div>
    </div>
</div>