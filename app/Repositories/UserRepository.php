<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $model) {}


    public function all(array $filters = [])
    {
        return $this->model
            ->applyFilters($filters)
            ->paginate($filters['per_page'] ?? 15);
    }


    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }


    public function delete(int $id)
    {
        $category = $this->find($id);
        return $category->delete();
    }
}
