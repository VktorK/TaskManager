<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\AdminIndexRequest;
use App\Http\Requests\User\Task\StoreTaskRequest;
use App\Http\Requests\User\Task\UpdateTaskRequest;
use App\Http\Resources\Admin\AdminTaskResource;
use App\Models\Task;
use App\Services\Admin\AdminTaskService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminTaskController extends Controller
{

    public function index(AdminIndexRequest $request): array
    {
        $data = $request->validated();
        $tasks = Task::filter($data)->get();
        return AdminTaskResource::collection($tasks)->resolve();
    }


    public function create()
    {
        //
    }


    public function store(StoreTaskRequest $request): array
    {
        $data = $request->validated();
        $task = AdminTaskService::create($data);
        return AdminTaskResource::make($task)->resolve();
    }


    public function show(Task $task): array
    {
        return AdminTaskResource::make($task)->resolve();
    }


    public function edit(Task $task)
    {
        //
    }


    public function update(UpdateTaskRequest $request, Task $task): array
    {
        $data = $request->validated();
        $task = AdminTaskService::update($task, $data);
        return AdminTaskResource::make($task)->resolve();
    }


    public function destroy(Task $task): JsonResponse
    {
        AdminTaskService::destroy($task);
        return response()->json([
            "message" => "Задание удалено"
        ], ResponseAlias::HTTP_OK);
    }
}
