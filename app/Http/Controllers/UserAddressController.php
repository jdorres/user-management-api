<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Interfaces\UserAddressServiceInterface;
use App\Services\UserAddressService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserAddressController extends Controller
{
    protected UserAddressService $userAddressService;

    public function __construct(UserAddressServiceInterface $userAddressService)
    {
        $this->userAddressService = $userAddressService;
    }

    public function store(StoreUserAddressRequest $request, string $id): JsonResponse
    {
        try{
            $data = $request->all();
            $user = $this->userAddressService->addUserAddressToUser($id, $data);
            return response()->json($user, Response::HTTP_CREATED);
        }catch(Exception $e){
            dd($e->getMessage());
            return response()->json(['message' => 'Falha ao adicionar endereço de usuário.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
