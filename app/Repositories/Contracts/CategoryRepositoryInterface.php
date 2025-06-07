<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $filters = []);

    /**
     * Find a category by its ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function find(int $id);

    /**
     * Create a new category.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function create(array $data);

    /**
     * Update an existing category.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Category
     */
    public function update(int $id, array $data);

    /**
     * Delete a category by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
