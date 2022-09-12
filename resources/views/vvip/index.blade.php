@extends('layouts.main')

@section('title')
    App.vvip
@endsection

@section('content')

    <h1>App.vvip</h1>

    <h1 class="mb-3 center">Задача {{ $taskBitrix_id }}</h1>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="w-50">Поле</th>
                <th scope="col">Значение</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Клиент</td>
                <td>
                    @include('includes.form.client_id')
                </td>
            </tr>
            <tr>
                <td>Оценка от спеца</td>
                <td>
                    @include('includes.form.expert_rating')
                </td>
            </tr>
            <tr>
                <td>Общее время</td>
                <td>
                    <?php
                        if(isset($task->expert_rating)){
                        $total_time = $task->expert_rating * 1.5;
                        echo $total_time;
                    }?>
                </td>
            </tr>
            <tr>
                <td>Ставка часа</td>
                <td>
                    @include('includes.form.hour_price')
                </td>
            </tr>
            <tr>
                <td>Стоимость задачи</td>
                <td>
                    <?php if(isset($total_time)){
                        $task_price = $total_time * $task->hour_price;
                        echo $task_price;                      
                    }?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @include('includes.form.button')
                </td>
            </tr>
        </tbody>
    </table>

@endsection
