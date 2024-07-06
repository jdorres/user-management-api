<?php

namespace App\Interfaces;

use App\Models\UserAddress;

interface UserAddressServiceInterface
{
    public function addUserAddressToUser(int $id, array $data): UserAddress;
}
