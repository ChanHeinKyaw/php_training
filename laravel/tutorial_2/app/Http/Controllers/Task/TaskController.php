<?php

namespace App\Http\Controllers\Task;

use App\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{
  private $taskInterface;

  public function __construct(TaskServiceInterface $taskServiceInterface)
  {
    $this->taskInterface = $taskServiceInterface;
  }

    public function index(){
        if (Auth::check()) {
            $tasks = $this->taskInterface->getTaskList();
            return view('tasks', compact('tasks'));
        } else {
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
    }

    public function store(TaskRequest $request){
        $task = $this->taskInterface->saveTask($request);
        return redirect('/');
    }

    public function destroy($id){
        $msg = $this->taskInterface->deleteTaskById($id);
        return redirect('/');
    }
}
