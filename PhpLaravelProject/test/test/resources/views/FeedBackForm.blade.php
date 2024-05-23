<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet"  href="{{ asset('css/styles.css') }}">
</head>
<body style="display: flex;
    justify-content: center;
    align-items: center;
    background: #1a202c">
<div style="background: white; border-radius: 30px; margin: 0px auto; max-width: 700px; padding: 30px">
    <h2>Форма обратной связи</h2>
    <p class="required-info">* Поля, помеченные звездочкой, являются обязательными для заполнения.</p>
    <form method="post" id="contactForm" action="{{route('feedback.store')}}">
        @csrf
        <x-input-name name="name" :value="old('name')"/>
        {{--<div class="form-group">
            <label for="name">* Имя:</label>
            <input type="text" id="name" name="name">
            @error('name')
            <span class="error" id="nameError">{{$message}}</span>
            @enderror
        </div>--}}
        <x-input-email name="email" :value="old('email')" />
        {{--<div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="name@company.com">
            @error('email')
            <span class="error" id="emailError">{{$message}}</span>
            @enderror
        </div>--}}
        <x-input-phone name="phone" :value="old('phone')" />
        {{--<div class="form-group">
            <label for="phone">* Номер телефона:</label>
            <input type="tel" id="phone" name="phone" placeholder="+7 (###)###-##-##">
            @error('phone')
            <span class="error" id="phoneError">{{$message}}</span>
            @enderror
        </div>--}}
        <x-input-message name="message" :value="old('message')" />
        {{--<div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" minlength="2" maxlength="255"></textarea>
            @error('message')
            <span class="error" id="messageError">{{$message}}</span>
            @enderror
        </div>--}}
        <div class="form-group">
            <input type="checkbox" id="agree" name="agree">
            <label for="agree">* Согласие с политикой обработки персональных данных</label>
            @error('agree')
            <span class="error" id="agreeError">{{$message}}</span>
            @enderror
        </div>
        <button style="border: 1px solid #1a202c" type="submit">Отправить</button>
    </form>
</div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
