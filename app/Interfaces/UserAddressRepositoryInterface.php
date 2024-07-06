<?php

namespace App\Interfaces;

use App\Models\UserAddress;

interface UserAddressRepositoryInterface
{
    public function find($id): ?UserAddress;
    public function store(int $id, array $data): UserAddress;
}
