<?php

namespace App\Contracts\Dao\Task;

interface TaskDaoInterface
{
    /**
     * Create Task
     * @param $request
     */
    public function saveTask($request);

    /**
     * Task List
     * @param $request
     */
    public function getTaskList();

    /**
     * Delete Task By Id
     * @param $id
     */
    public function deleteTaskById($id);
}
