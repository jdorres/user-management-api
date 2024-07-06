<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    protected User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(): Collection{
        return $this->model->all();
    }

    public function find($id): ?User{
        return $this->model->find($id);
    }

    public function store(array $data): User{
        return $this->model->create($data);
    }

    public function update(int $id, array $data): ?User{
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }
    
    public function delete($id): bool{
        $user = $this->find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}