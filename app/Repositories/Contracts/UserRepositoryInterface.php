<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
     /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $filters = []);

    /**
     * Find a user by its ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    public function find(int $id);

    /**
     * Create a new user.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data);

    /**
     * Update an existing user.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\User
     */
    public function update(int $id, array $data);

    /**
     * Delete a user by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
