<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
    /**
     * Create Task
     * @param $request
     */
    public function saveTask($request);

    /**
     * Task Lisk
     * @param $request
     */
    public function getTaskList();

    /**
     * Delete Task By Id
     * @param $request
     */
    public function deleteTaskById($id);
}
