
@extends('layout')
@section('meta')
    <meta name="csrf-token-request" content="{{ csrf_token() }}">
@endsection
@section('title')
    Заявки
@endsection()
@section('main-content')
    <h2>Все заявки</h2>
    <!--табличка для вывода всех заявок -->
    <div class="scrollable-table">
        <table border="1">
            <thead>
            <tr>
                {{--<th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'id', 'direction' => 'asc'])) }}">Номер</a></th>
                <th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'name', 'direction' => 'asc'])) }}">Имя</a></th>
                <th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'phone', 'direction' => 'asc'])) }}">Телефон</a></th>
                <th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'email', 'direction' => 'asc'])) }}">E-mail</a></th>
                <th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'message', 'direction' => 'asc'])) }}">Сообщение</a></th>
                <th><a href="{{ route('requests.index', array_merge($_GET,['sort' => 'status', 'direction' => 'asc'])) }}">Статус</a></th>--}}
                 <th>Номер</th>
                 <th>Имя</th>
                 <th>Телефон</th>
                 <th>E-mail</th>
                 <th>Сообщение</th>
                 <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $item)
                <tr>
                    <td> {{$item->id}} </td>
                    <td> {{$item->name}} </td>
                    <td> {{$item->phone}} </td>
                    <td> {{$item->email}} </td>
                    <td> {{$item->message}} </td>
                    @if ($item->status)
                     <td>Обработанная</td>
                    @else
                    <td>Необработанная</td>
                    @endif
                    <td><img src="/images/edit.png" style="max-width: 40px; max-height: 40px" alt="Редактирование" onclick="window.location.href='/requests/{{$item->id}}/edit'"></img></td>
                    <td><img src="/images/delet.png" style="max-width: 40px; max-height: 40px" alt="Удалить" onclick="deleteRequest({{$item->id}})"></img></td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{$requests->links('vendor.pagination.custom')}}
    </div>
    <div style="display: flex; margin: 10px">
        <div style="padding: 10px">
            <form style="display: flex; margin: 10px" id="searchForm" onsubmit="applyFilters(); return false;">
                <input type="text" name="nameOrEmail" placeholder="Имя или E-mail">
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
                    <option value="message">Сообщение</option>
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
        <div style="margin: 10px;padding: 10px; border-radius: 30px; max-width: 200px;">
            <p>Количество записей:</p>
            <div>
                <button onclick="setPerPage(10)">10</button>
                <button onclick="setPerPage(25)">25</button>
                <button onclick="setPerPage(50)">50</button>
            </div>
        </div>
        <div style="margin: 10px; padding: 10px">
            <p>Добавить новую заявку:</p>
            <button onclick="window.location.href='/requests/create'">Новая заявка</button>
        </div>
    </div>
    <div id="deleteRequestModal" class="modal">
        <div class="modal-content">
            @csrf
            <p>Вы уверены, что хотите удалить этогу заявку?</p>
            <button onclick="confirmDeleteRequest()">Да</button>
            <button onclick="closeDeleteRequestModal()">Отмена</button>
        </div>
    </div>
    <script src="{{ asset('js/scriptadmin.js') }}"></script>
@endsection()

