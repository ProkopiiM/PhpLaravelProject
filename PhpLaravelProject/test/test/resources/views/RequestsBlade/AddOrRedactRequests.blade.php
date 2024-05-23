@extends('layout')
@section('title')
    Форма обратной связи
@endsection
@section('main-content')
    <div style="max-width: 600px;">
        @if($request == null)
            <h2>Добавление задания</h2>
        @else
            <h2>Редактирование задания</h2>
        @endif
        <p class="required-info">* Поля, помеченные звездочкой, являются обязательными для заполнения.</p>
        <form method="post" action="{{ isset($request) ? route('requests.update', $request->id) : route('requests.store') }}">
            @csrf
            @if(isset($request))
                @method('PUT')
            @endif
            <x-input-name name="name" :value="$request->name ?? old('name')"/>
            {{--<div class="form-group">
                <label for="name">* Имя:</label>
                <input type="text" id="name" name="name" value="{{ old('name') ?? isset($request) ? $request->name : '' }}">
                @error('name')
                <span class="error">{{$message}}</span>
                @enderror
            </div>--}}
            <x-input-email name="email" :value="$request->email ?? old('email')" />
            {{--<div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="name@company.com" value="{{ old('email') ?? isset($request) ? $request->email : '' }}">
                @error('email')
                <span class="error">{{$message}}</span>
                @enderror
            </div>--}}
            <x-input-phone name="phone" :value="$request->phone ?? old('phone')" />
            {{--<div class="form-group">
                <label for="phone">* Номер телефона:</label>
                <input type="tel" id="phone" name="phone" placeholder="+7 (###)###-##-##" value="{{  old('phone') ?? isset($request) ? $request->phone : '' }}">
                @error('phone')
                <span class="error">{{$message}}</span>
                @enderror
            </div>--}}
            <x-input-message name="message" :value="$request->message ?? old('message')" />
            {{--<div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea id="message" name="message" maxlength="255" >{{ old('message') ?? isset($request) ? $request->message : '' }}</textarea>
                @error('message')
                <span class="error">{{$message}}</span>
                @enderror
            </div>--}}
            <div class="form-group">
                <label for="status">Статус:</label>
                <select id="status" name="status">
                    <option value="1" {{ old('status') ?? isset($request) && $request->status === 1 ? 'selected' : '' }}>Обработанная</option>
                    <option value="0" {{ old('status') ?? isset($request) && $request->status === 0 ? 'selected' : '' }}>Необработанная</option>
                </select>
            </div>
            @if($request != null)
                <input type="hidden" name="id" value="{{ $request->id }}">
            @endif
            <button type="submit">Сохранить</button>
        </form>
        <script src="{{ asset('js/scriptforrequest.js') }}"></script>
    </div>
@endsection
