<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function index(): Collection;
    public function find($id): ?User;
    public function store(array $data): User;
    public function update(int $id, array $data): ?User;
    public function delete($id): bool;
}
