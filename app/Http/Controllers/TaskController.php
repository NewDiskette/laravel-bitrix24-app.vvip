<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Bitrix24\CRest;

class TaskController extends Controller
{
    public function index()
    {
        $result = CRest::call('tasks.task.list');
        $tasksBitrix = $result['result']['tasks'];
        $tasks = Task::all();
        $clients = Client::all();
        foreach($tasksBitrix as $taskBitrix){
            $arrayTasksBitrixId[] = $taskBitrix['id'];
        }
        foreach($tasks as $task){
            if(!in_array($task->task_bitrix_id, $arrayTasksBitrixId))
                $task->delete();
        }
        return view('tasks.index', compact('tasks', 'clients', 'tasksBitrix'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('tasks.create', compact('clients'));
    }

    public function store(StoreTaskRequest $request)
    {     
        $data = $request->validated();
        if(isset($data['taskBitrix_id'])){
            $taskBitrix = $this->updateTaskBitrix($data);
            $this->createTask($data, $taskBitrix['id']);
            return redirect()->route('vvip.index');
        }    
        $taskBitrix = $this->addTaskBitrix($data);
        $this->createTask($data, $taskBitrix['id']);
        return redirect()->route('tasks.index');
    }

    public function addDeadline()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        $date = getdate();
        if ($date['wday'] != 5 && $date['wday'] != 6)
            $date['mday'] += 1;
        else if ($date['wday'] == 5)
            $date['mday'] += 3;
        else $date['mday'] += 2;
        $deadline = $date['mday'] . '-' . $date['mon'] . '-' . $date['year'] . ' ' . '17:00';
        return $deadline;
    }

    public function createTask($data, $taskBitrix_id)
    {
        Task::create([
            'title' => $data['title'],
            'client_id' => $data['client_id'],
            'business_task' => $data['business_task'],
            'task_bitrix_id' => $taskBitrix_id
        ]);
    }

    public function addTaskBitrix($data)
    {
        $result = CRest::call(
            'tasks.task.add',
            [
                'fields' => [
                    'TITLE' => $data['title'],
                    'RESPONSIBLE_ID' => 1,
                    'DEADLINE' => $this->addDeadline(),
                    'DESCRIPTION' => $data['business_task'],
                ]
            ]
        );
        $taskBitrix = $result['result']['task'];
        return $taskBitrix;
    }

    public function updateTaskBitrix($data)
    {
        $result = CRest::call(
            'tasks.task.update', 
            [
                'taskId' => $data['taskBitrix_id'],
                'fields' => [
                    'TITLE' => $data['title'],
                    'DESCRIPTION' => $data['business_task'],
                    'DEADLINE' => $this->addDeadline(),
                ]
            ] 
        );
        $taskBitrix = $result['result']['task'];
        return $taskBitrix;
    }
}
