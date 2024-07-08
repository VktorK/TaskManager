<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Get(
 *     path="/api/user/tasks",
 *     summary="Список Заданий авторизированного пользователя",
 *     tags={"Пользовательские функции (Данные Заданий)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *          name="title",
 *          description="Название Задания",
 *          required=false,
 *          in="query",
 *          @OA\Schema(type="string"),
 *      ),
 *      @OA\Parameter(
 *          name="content",
 *          description="Описание Задания",
 *          required=false,
 *          in="query",
 *          @OA\Schema(type="string"),
 *      ),
 *      @OA\Parameter(
 *          name="status",
 *          description="Статус задания,
 *          1-Создано
 *          2-Исполнено
 *          3-Удалено",
 *          required=false,
 *          in="query",
 *          @OA\Schema(type="integer"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_from",
 *     description="Дата создания с",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date-time"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_to",
 *     description="Дата создания до",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date-time"),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Переустановить что-то"),
 *                 @OA\Property(property="content", type="text", example="Способ переустановки"),
 *                 @OA\Property(property="status", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *   @OA\Patch(
 *     path="/api/user/tasks/{task}",
 *     summary="Обновление данных Задания принадлажащего авторизированному пользователю",
 *     tags={"Пользовательские функции (Данные Заданий)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         description="id task",
 *         in="path",
 *         name="task",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Переустановить MacOs"),
 *                     @OA\Property(property="content", type="text", example="Действия по заданию"),
 *                     @OA\Property(property="status", type="integer", example=1),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Переустановить MacOs"),
 *                 @OA\Property(property="content", type="text", example="Действия по заданию"),
 *                 @OA\Property(property="status", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/user/tasks/{task}",
 *     summary="Просмотр Задания авторизированного пользователя",
 *      tags={"Пользовательские функции (Данные Заданий)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id task",
 *     in="path",
 *     name="task",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Переустановить MacOs"),
 *                 @OA\Property(property="content", type="text", example="Действия по заданию"),
 *                 @OA\Property(property="status", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 * @OA\Delete(
 *     path="/api/user/tasks/{task}",
 *     summary="Удаление 'Задание', принадлажащего авторизированному пользователю",
 *     tags={"Пользовательские функции (Данные Заданий)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id task",
 *     in="path",
 *     name="task",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example=" Task Deleted")
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/user/tasks",
 *     summary="Создание 'Задания', автоматические прокидывает user_id и status=1",
 *     tags={"Пользовательские функции (Данные Заданий)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Переустановить MacOs"),
 *                      @OA\Property(property="content", type="text", example="Действия по заданию"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Переустановить MacOs"),
 *             @OA\Property(property="content", type="text", example="Действия по заданию"),
 *             @OA\Property(property="status", type="integer", example=1),
 *             @OA\Property(property="user_id", type="integer", example=1),
 *             @OA\Property(property="created_at", type="date", example="2010-10-22"),
 *
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 */


class TaskController extends Controller
{

}
