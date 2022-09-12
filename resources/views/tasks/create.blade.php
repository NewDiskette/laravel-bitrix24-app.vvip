@extends('layouts.main')

@section('title')
    @if(isset($taskBitrix['id']))
        Задача {{ $taskBitrix['id'] }}
    @else
        Добавление задачи
    @endif
@endsection

@section('content')

    <div class="row ml-3 mb-3">
        @if(isset($taskBitrix['id']))
            <h1>Задача {{ $taskBitrix['id'] }}</h1>
        @else
            <h1>Добавление задачи</h1>
        @endif
    </div>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3 w-25">
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
            <input required type="text" class="form-control" id="title" name="title"
                <?php if(isset($taskBitrix['title']))
                    echo 'value="' . $taskBitrix['title'] . '"';
                ?> 
            >
        </div>

        <div class="form-group mb-3">
            <label for="business_task">Бизнес-задача</label>
            <textarea required class="form-control" id="business_task" name="business_task" rows="5"
            ><?php if(isset($taskBitrix['description'])) echo $taskBitrix['description'];?></textarea>
        </div>
        
        @if(isset($taskBitrix['id']))
            <input type="hidden" name="taskBitrix_id" value="{{ $taskBitrix['id'] }}">
        @endif 
        <input type="submit" class="btn btn-dark" value="Сохранить">

    </form>

@endsection
