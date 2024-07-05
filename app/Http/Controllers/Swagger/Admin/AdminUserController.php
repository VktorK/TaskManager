<?php

namespace App\Http\Controllers\Swagger\Admin;

use App\Http\Controllers\Controller;



/**
 *
 * @OA\Get(
 *     path="/api/admin/users",
 *     summary="Список пользователей",
 *     tags={"Админские функции (Взаимодействие с User)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="email", type="string", example="example@example.com"),
 *                 @OA\Property(property="created_at", type="datetime", example="2024-07-05T12:17:58"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 *
 * @OA\Get(
 *     path="/api/admin/users/{user}",
 *     summary="Просмотр профиля",
 *     tags={"Админские функции (Взаимодействие с User)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id user",
 *     in="path",
 *     name="user",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="LitleMan"),
 *             @OA\Property(property="email", type="string", example="example@example.com"),
 *
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 *
 * @OA\Post(
 *     path="/api/admin/users",
 *     summary="Создание пользователя",
 *     tags={"Админские функции (Взаимодействие с User)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Tim"),
 *                     @OA\Property(property="email", type="string", example="example@example.com"),
 *                     @OA\Property(property="password", type="string", example="123123123"),
 *                     @OA\Property(property="confirm_password", type="string", example="123123123"),
 *                 )
 *             }
 *         )
 *     ),

 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Tim"),
 *             @OA\Property(property="email", type="string", example="example@example.com"),
 *             @OA\Property(property="password", type="string", example="123123123"),
*         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 * @OA\Patch(
 *     path="/api/admin/users/{user}",
 *     summary="Обновление профиля user",
 *     tags={"Админские функции (Взаимодействие с User)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         description="id user",
 *         in="path",
 *         name="user",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Tim"),
 *                     @OA\Property(property="email", type="string", example="example@example.com"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *                     @OA\Property(property="name", type="string", example="Tim"),
 *                     @OA\Property(property="email", type="string", example="example@example.com"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 *
 *
 * @OA\Delete(
 *     path="/api/admin/users/{user}",
 *     summary="Удаление профиля пользователя",
 *     tags={"Админские функции (Взаимодействие с User)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id user",
 *     in="path",
 *     name="user",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Пользователь удален")
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 */
class AdminUserController extends Controller
{

}
