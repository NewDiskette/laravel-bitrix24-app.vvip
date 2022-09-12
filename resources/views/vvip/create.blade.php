@extends('layouts.main')


@section('title')
    Добавление задачи
@endsection

@section('content')

    <div class="row ml-3 mb-3">
        <h1>Добавление задачи</h1>
    </div>

    <form action="{{ route('tasks.store') }}" method="POST" class="w-25">
        @csrf
        <div class="form-group mb-3">
            <label class="my-1 mr-4" for="client_id">Клиент</label>
            <select required class="form-select" size="4"
                id="client_id" name="client_id">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="title">Название</label>
            <input required type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group mb-3">
            <label for="business_task">Бизнес-задача</label>
            <textarea required class="form-control" id="business_task" name="business_task" rows="5"></textarea>
        </div>

        <input type="submit" class="btn btn-dark" value="Сохранить">

    </form>

@endsection
