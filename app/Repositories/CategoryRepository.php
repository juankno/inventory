<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function __construct(protected Category $model) {}


    public function all(array $filters = [])
    {
        //
    }


    public function find(int $id)
    {
        //
    }


    public function create(array $data)
    {
        //
    }


    public function update(int $id, array $data)
    {
        //
    }


    public function delete(int $id)
    {
        //
    }
}
