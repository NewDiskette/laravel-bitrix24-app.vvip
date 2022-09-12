@extends('layouts.main')

@section('title')
    Задачи
@endsection

@section('content')

    <h1>Задачи</h1>

    <div class="row">
        <div class="col-2 ml-3 mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-block btn-dark">
                Добавить
            </a>
        </div>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название задачи</th>
                <th scope="col">Ссылка на Битрикс24</th>
                <th scope="col">Клиент</th>
                <th scope="col">Дедлайн</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>
                        @php
                            $link_bitrix = "https://newdiskette2.bitrix24.ru/company/personal/user/1/tasks/task/view/$task->task_bitrix_id/";
                        @endphp
                        <a href="{{ $link_bitrix }}" target="_blank">
                            Задача {{ $task->task_bitrix_id }}
                        </a>
                    </td>
                    <td>
                        @foreach($clients as $client)
                            @if($task->client_id == $client->id)
                                {{ $client->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($tasksBitrix as $taskBitrix)
                            @if($task->task_bitrix_id == $taskBitrix['id'])
                                {{ $taskBitrix['deadline'] }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
