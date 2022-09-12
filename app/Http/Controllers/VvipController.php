<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVvipRequest;
use App\Models\Bitrix24\CRest;

class VvipController extends Controller
{
    public function index()
    {
        $taskBitrix_id = $this->getTaskBitrixId();
        $clients = Client::all();
        $task = Task::where('task_bitrix_id', $taskBitrix_id)->first();
        if($task == null){
            $result = CRest::call(
                'tasks.task.get',
                ['taskId' => $taskBitrix_id]
            );
            $taskBitrix = $result['result']['task'];
            return view('tasks.create', compact('taskBitrix', 'clients'));
        } 
        return view('vvip.index', compact('task', 'clients', 'taskBitrix_id'));
    }

    public function store(StoreVvipRequest $request)
    {
        $data = $request->validated();
        $task = Task::find($data['task_id']);
        $task->client_id = $data['client_id'];
        $task->expert_rating = $data['expert_rating'];
        $task->hour_price = $data['hour_price'];
        $task->task_bitrix_id = $data['taskBitrix_id'];
        $task->save();
        return redirect()->route('vvip.index');
    }

    public function getTaskBitrixId()
    {
        if(isset($data['taskBitrix_id'])){
            $taskBitrix_id = $data['taskBitrix_id'];
        }else if(isset($_POST['PLACEMENT_OPTIONS'])){
            $taskBitrix_id = (int)mb_substr($_POST['PLACEMENT_OPTIONS'], 11, 3);
            file_put_contents('../bitrix24/task_bitrix_id.txt', $taskBitrix_id);
        }else{
             $taskBitrix_id = (int)file_get_contents('../bitrix24/task_bitrix_id.txt');
        } 
        return $taskBitrix_id;
    }
}
