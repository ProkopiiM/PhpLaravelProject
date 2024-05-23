<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet"  href="{{ asset('css/styles.css') }}">
</head>
<body style="display: flex;
    justify-content: center;
    align-items: center;
    background: #1a202c">
<div class="containerAuth">
    <h2>Авторизация</h2>
    <form id="authForm" method="post" action="login">
        @csrf
        <div class="form-div">
            <label for="email">Почта:</label>
            <input type="text" id="email" name="email">
            <span class="error" id="emailError">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-div">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password">
            <span class="error" id="passwordError">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-div">
            <div class="checkbox-and-button">
                <button type="submit">Войти</button>
            </div>
            @if(session('error'))
                <span class="error">{{ session('error') }}</span>
            @endif
        </div>
    </form>
</div>
<script>
    window.onload = function() {
        var status = "{{ session('status') }}";
        if (status) {
            alert(status);
        }
    };
</script>
<script src="{{ asset('js/scriptadmin.js') }}"></script>
</body>
</html>
