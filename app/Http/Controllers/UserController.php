<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $list = $this->userService->getAllUsers();
        return response()->json($list, Response::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        try{
            $user = $this->userService->getUserById($id);
            return response()->json($user, Response::HTTP_OK);
        }catch(Exception $e){
            return response()->json(['message' => 'Falha ao exibir usuário'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        try{
            $data = $request->all();
            $user = $this->userService->createUser($data);
            return response()->json($user, Response::HTTP_CREATED);
        }catch(Exception $e){
            return response()->json(['message' => 'Falha ao criar usuário'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, string $id):JsonResponse
    {
        try{
            $data = $request->all();
            $user = $this->userService->updateUser($id, $data);
            return response()->json($user, Response::HTTP_CREATED);
        }catch(Exception $e){
            return response()->json(['message' => 'Falha ao atualizar usuário'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(string $id):JsonResponse
    {
        try{
            $this->userService->deleteUser($id);
            return response()->json([], Response::HTTP_OK);
        }catch(Exception $e){
            return response()->json(['message' => 'Falha ao deletar usuário'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
