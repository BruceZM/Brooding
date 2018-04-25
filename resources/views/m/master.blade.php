<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/m.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper-3.4.2.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <router-view></router-view>
    <tab ></tab>
   {{-- <ul class="tab">
        <router-link to="/fav" tag="li" class="active">
            <span class="glyphicon glyphicon-user"></span>
            <p>用户</p>
        </router-link>
        <router-link to="/post" tag="li">
            <span class="glyphicon glyphicon-bookmark"></span>
            <p>文章</p>
        </router-link>
        <router-link to="/msg" tag="li">
            <span class="glyphicon glyphicon-comment"></span>
            <p>消息</p>
        </router-link>
        <router-link to="/about" tag="li">
            <span class="glyphicon glyphicon-cog"></span>
            <p>我的</p>
        </router-link>
    </ul>--}}
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/m.js') }}"></script>
<script src="{{ asset('js/swiper-3.4.2.min.js') }}"></script>
</body>
</html>
