
@extends('layout')
@section('meta')
    <meta name="csrf-token-user" content="{{ csrf_token() }}">
@endsection
@section('title')
    Пользователи
@endsection()
@section('main-content')
    <h2>Все пользователи</h2>
    <div class="scrollable-table">
        <table border="1">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Дата создания</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td> {{$item->id}} </td>
                    <td>{{$item->name}}</td>
                    <td> {{$item->email}} </td>
                    <td>{{$item->dateadd}} </td>
                    @if ($item->status)
                    <td>Имеет доступ</td>
                    @else
                     <td>Нет доступа</td>
                    @endif
                    <td><img src="/images/edit.png" style="max-width: 40px; max-height: 40px" alt="Редактировать" onclick="window.location.href='/users/{{$item->id}}/edit'"></img></td>
                    <td><img src="/images/delet.png" style="max-width: 40px; max-height: 40px" alt="Удалить" onclick="deleteUser({{$item->id}})"></img></td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $users->links('vendor.pagination.custom') }}
    </div>
    <div style="display: flex">
        <div style="padding: 10px">
            <form style="display: flex; margin: 10px" id="searchForm" onsubmit="applyFilters(); return false;">
                <input style="max-width: 400px" type="text" name="nameOrEmail" placeholder="Имя или E-mail">
                <button type="submit">Поиск</button>
            </form>
        </div>
        <div style="padding: 10px">
            <p>Сортировака/Фильтрация</p>
            <div style="margin: 10px">
                <select id="sortField" onchange="applyFilters()">
                    <option value="id">Номер</option>
                    <option value="name">Имя</option>
                    <option value="email">E-mail</option>
                    <option value="status">Статус</option>
                </select>
                <select id="sortDirection" onchange="applyFilters()">
                    <option value="asc">По возрастанию</option>
                    <option value="desc">По убыванию</option>
                </select>
            </div>
        </div>
    </div>
    <div style="display: flex;">
        <div style="padding: 10px; border-radius: 30px; max-width: 200px;">
            <p>Количество записей:</p>
            <div>
                <button onclick="setPerPage(10)">10</button>
                <button onclick="setPerPage(25)">25</button>
                <button onclick="setPerPage(50)">50</button>
            </div>
        </div>
        <div style="margin: 10px">
            <p>Добавление пользователя:</p>
            <button onclick="window.location.href='/users/create'">Добавить нового пользователя</button>
        </div>
    </div>
    <div id="deleteUserModal" class="modal">
        <div class="modal-content">
            @csrf
            <p>Вы уверены, что хотите удалить этого пользователя?</p>
            <button onclick="confirmDeleteUser()">Да</button>
            <button onclick="closeDeleteUserModal()">Отмена</button>
        </div>
    </div>
    <script>
        window.userId = {{\Illuminate\Support\Facades\Auth::id()}};
    </script>
    <script src="{{ asset('js/scriptuser.js') }}"></script>
@endsection()
