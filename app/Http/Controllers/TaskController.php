<?php

namespace App\Http\Controllers;

use App\Http\Filters\TaskFilter;
use App\Http\Requests\Task\IndexTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mysql_xdevapi\TableSelect;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskController extends Controller
{

    public function index(IndexTaskRequest $request)
    {
        $data = $request->validated();
        $filter = new TaskFilter();
        $tasks = Task::query();

        $tasks = $filter->apply($tasks,$data)->get();
        return TaskResource::collection($tasks)->resolve();
    }


    public function create()
    {
        dd(11111111);
    }


    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = TaskService::create($data);
        return TaskResource::make($task);
    }


    public function show(Task $task)
    {
        return TaskResource::make($task);
    }


    public function edit(Task $task)
    {
        dd(11111111);
    }


    public function update(UpdateTaskRequest $request, Task $task):TaskResource
    {
        $data = $request->validated();
        $task = TaskService::update($task, $data);
        return TaskResource::make($task);
    }


    public function destroy(Task $task)
    {
        TaskService::destroy($task);
        return response()->json([
            "message" => "Задание удалено"
        ], ResponseAlias::HTTP_OK);
    }


}
