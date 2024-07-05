<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;


/**
 *
 *
 * @OA\Patch(
 *     path="/api/user/users",
 *     summary="Обновление данных у настоящего пользователя",
 *     tags={"Пользователь"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Timmy"),
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
*              @OA\Property(property="id", type= "integer", example= 1),
*              @OA\Property(property="name", type= "string", example= "Timmy"),
 *             @OA\Property(property="email", type = "string", example= "one@two.com")
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 *
 * @OA\Delete(
 *     path="/api/user/users",
 *     summary="Удаление настоящего пользователя",
 *     tags={"Пользователь"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Удалил сам себя")
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautorized"
 *     )
 * )
 *
 */
class UserAccountController extends Controller
{

}
