<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(protected Product $model) {}


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
