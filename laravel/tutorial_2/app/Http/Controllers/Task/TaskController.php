<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{
    /**
     * Task Interface
     */
    private $taskInterface;

    /**
     * Create a new controller instance.
     * @param TaskServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * View Home Page
     * @return Tasks View
     */
    public function index()
    {
        if (Auth::check()) {
            $tasks = $this->taskInterface->getTaskList();
            return view('tasks', compact('tasks'));
        } else {
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
    }

    /**
     * Submit Task 
     * @param TaskRequest $TaskRequest
     * @return Tasks View
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskInterface->saveTask($request);
        return redirect('/');
    }

    /**
     * Delete Task 
     * @param $id
     * @return Home View
     */
    public function destroy($id)
    {
        $msg = $this->taskInterface->deleteTaskById($id);
        return redirect('/');
    }
}
