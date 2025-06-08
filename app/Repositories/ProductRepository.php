<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(protected Product $model) {}


    public function all(array $filters = [])
    {
        return $this->model->with('category')->paginate($filters['per_page'] ?? 15);
    }


    public function find(int $id)
    {
        return $this->model->findOrFail($id)->load('category');
    }


    public function create(array $data)
    {
        return $this->model->create($data)->load('category');
    }


    public function update(int $id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category->fresh();
    }


    public function delete(int $id)
    {
        $category = $this->find($id);
        return $category->delete();
    }
}
