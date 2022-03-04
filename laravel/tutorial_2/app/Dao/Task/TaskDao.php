<?php

namespace App\Dao\Task;

use App\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;

class TaskDao implements TaskDaoInterface
{
    /**
     * Create Task
     * @param $request
     * @return
     */
    public function saveTask($request)
    {
        $task = new Task();
        $task->name = $request['name'];
        $task->save();
        return $task;
    }

    /**
     * Task List
     * @param
     * @return 
     */
    public function getTaskList()
    {
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * Delete Task By Id
     * @param
     * @return 
     */
    public function deleteTaskById($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect("/")->withSuccess('Oppes! No Found!');
        } else {
            $task->delete();
            return 'Deleted Successfully!';
        }
    }
}
