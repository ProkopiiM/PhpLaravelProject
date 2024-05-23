@extends('layout')
@section('title')
   Форма работы с пользователем
@endsection
@section('main-content')
    @if($users == null)
        <h2>Добавление пользователя</h2>
    @else
        <h2>Редактирование пользователя</h2>
    @endif
    <div style="max-width: 600px;">
        <form id="userForm" method="post" action="{{ isset($users) ? route('users.update', $users->id) : route('users.store') }}">
            @csrf
            @if(isset($users))
                @method('PUT')
            @endif
            <x-form-group :label="'Имя'" :name="'name'" :value="isset($users) ? $users->name : ''" :error="$errors->first('name')"></x-form-group>

            <x-form-group :label="'E-mail'" :name="'email'" :type="'email'" :value="isset($users) ? $users->email : ''" :error="$errors->first('email')"></x-form-group>

            <x-form-group :label="'Пароль'" :name="'password'" :type="'password'" :error="$errors->first('password')"></x-form-group>

            <x-form-group :label="'Повторите пароль'" :name="'password_confirmation'" :type="'password'" :error="$errors->first('password_confirmation')"></x-form-group>

            <div class="form-group">
                <label for="status">Статус</label>
                <select id="status" name="status">
                    <option value="1" {{(isset($users) && $users->status === 1 ? 'selected' : '') }} {{ isset($users)    && $users->id == \Illuminate\Support\Facades\Auth::id() ? 'disabled' : '' }}>Разрешить доступ</option>
                    <option value="0" {{(isset($users) && $users->status === 0 ? 'selected' : '') }} {{ isset($users) && $users->id == \Illuminate\Support\Facades\Auth::id() ? 'disabled' : '' }}>Заблокировать доступ</option>
                </select>
            </div>
            @if($users == null)
                <input type="hidden" name="id" value="0">
            @endif
            @if($users != null)
                <input type="hidden" name="id" value="{{ $users->id }}">
                @if($users->id == \Illuminate\Support\Facades\Auth::id())
                    <input type="hidden" name="status" value="1">
                @endif
            @endif
                <button type="submit">Сохранить</button>
        </form>
    </div>
    <script src="{{asset('js/scriptforuser.js')}}"></script>
@endsection
