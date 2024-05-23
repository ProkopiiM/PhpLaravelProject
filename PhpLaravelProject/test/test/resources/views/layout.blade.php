<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="stylesheet"  href="{{ asset('css/styles.css') }}">
</head>
<body style="background: lightgray;">
<div class="navbar">
    <div style="display: flex;height: 50px; margin: 10px; padding: 10px">
        <img style="max-width: 40px;max-height: 40px;border-radius: 50px;" src="{{asset('/images/ico_solo.png')}}">
    </div>
    <hr>
    <div style="height: 50px; margin: 10px; padding: 10px">
        <p>{{ Auth::user()->name }}</p>
    </div>
    <hr>
    <div class="divNavBar">
        <button onclick="window.location.href = '/mainlayout'">Главная страница</button>
        <button onclick="window.location.href = '/requests'">Заявки</button>
        <button onclick="window.location.href = '/users'">Пользователи</button>
        <form action="{{ route('auth.logout') }}" method="get">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </div>
</div>
<div id="content" class="main-content">
    @yield('main-content')
</div>

</body>
</html>
