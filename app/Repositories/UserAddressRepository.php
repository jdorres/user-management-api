<?php

namespace App\Repositories;

use App\Interfaces\UserAddressRepositoryInterface;
use App\Models\UserAddress;

class UserAddressRepository implements UserAddressRepositoryInterface
{
    protected UserAddress $model;

    public function __construct(UserAddress $user)
    {
        $this->model = $user;
    }

    public function find($id): ?UserAddress{
        return $this->model->find($id);
    }

    public function store(int $id, array $data): UserAddress{
        $data['user_id'] = $id;
        return $this->model->create($data);
    }
}