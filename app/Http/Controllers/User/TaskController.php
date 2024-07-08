<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Task\DestroyTaskRequest;
use App\Http\Requests\User\Task\IndexTaskRequest;
use App\Http\Requests\User\Task\ShowRequest;
use App\Http\Requests\User\Task\StoreTaskRequest;
use App\Http\Requests\User\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Services\User\UserTaskService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskController extends Controller
{

    public function index(IndexTaskRequest $request): array
    {
        $data = $request->validated();
        $tasks = Task::filter($data)->get();
        return TaskResource::collection($tasks)->resolve();
    }


    public function create()
    {
        //
    }


    public function store(StoreTaskRequest $request): array
    {
        $data = $request->validationData();
        $task = UserTaskService::store($data);
        return TaskResource::make($task)->resolve();
    }


    public function show(ShowRequest $request, Task $task): array
    {
        $request->validated();
        return TaskResource::make($task)->resolve();
    }


    public function edit(Task $task)
    {
        //
    }


    public function update(UpdateTaskRequest $request, Task $task): array
    {

        $data = $request->validated();
        $task = UserTaskService::update($task, $data);
        return TaskResource::make($task)->resolve();
    }


    public function destroy(DestroyTaskRequest $request, Task $task): JsonResponse
    {
        $request->validated();
        UserTaskService::destroy($task);
        return response()->json([
            "message" => "Задание удалено"
        ], ResponseAlias::HTTP_OK);
    }
}
