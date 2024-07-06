<?php

namespace App\Services;

use App\Interfaces\UserAddressServiceInterface;
use App\Interfaces\UserAddressRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\UserAddress;
use Exception;
use Illuminate\Http\Response;

class UserAddressService implements UserAddressServiceInterface
{
    private UserAddressRepositoryInterface $userAddressRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(UserAddressRepositoryInterface $userAddressRepository, UserRepositoryInterface $userRepository)
    {
        $this->userAddressRepository = $userAddressRepository;
        $this->userRepository = $userRepository;
    }

    public function addUserAddressToUser(int $id, array $data): UserAddress{
        $user = $this->userRepository->find($id);
        if($user){
            $userAddress = $this->userAddressRepository->store($user->id, $data);
            return $userAddress->fresh();
        }
        throw new Exception('User not found', Response::HTTP_NOT_FOUND);
    }
}