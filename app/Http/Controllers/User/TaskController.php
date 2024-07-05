<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\IndexTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskController extends Controller
{

    public function index(IndexTaskRequest $request): array
    {
        $data = $request->validated();
        $tasks = TaskService::index($data);
        return TaskResource::collection($tasks)->resolve();
    }


    public function create()
    {
        //
    }


    public function store(StoreTaskRequest $request): array
    {
        $data = $request->validationData();
        $task = TaskService::store($data);
        return TaskResource::make($task)->resolve();
    }


    public function show(Task $task): array
    {
        return TaskResource::make($task)->resolve();
    }


    public function edit(Task $task)
    {
        //
    }


    public function update(UpdateTaskRequest $request, Task $task): array
    {

        $data = $request->validated();
        $task = TaskService::update($task, $data);
        return TaskResource::make($task)->resolve();
    }


    public function destroy(Task $task): JsonResponse
    {
        TaskService::destroy($task);
        return response()->json([
            "message" => "Задание удалено"
        ], ResponseAlias::HTTP_OK);
    }
}
