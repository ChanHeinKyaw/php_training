<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;


class TaskService implements TaskServiceInterface
{
    /**
     * Task Dao
     */
    private $taskDao;

    /**
     * Class Constructor
     * @param TaskDaoInterface $taskDao
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To Save Task with values from request
     * @param Request $request
     * @return
     */
    public function saveTask($request)
    {
        return $this->taskDao->saveTask($request);
    }

    /**
     * View Task List
     * @return
     */
    public function getTaskList()
    {
        return $this->taskDao->getTaskList();
    }

    /**
     * Delete Task By Id
     * @return
     */
    public function deleteTaskById($id)
    {
        return $this->taskDao->deleteTaskById($id);
    }
}
