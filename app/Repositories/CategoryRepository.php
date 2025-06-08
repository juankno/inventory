<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function __construct(protected Category $model) {}


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
