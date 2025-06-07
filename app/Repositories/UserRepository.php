<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $model) {}


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
