<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{

    public function __construct(protected CategoryRepositoryInterface $categoryRepository) {}


    /**
     * List all categories.
     *
     * This method is used to retrieve a list of all categories.
     * It can be used to display categories in a view or return them as a JSON response.
     *
     * @response AnonymousResourceCollection<LengthAwarePaginator<CategoryResource>>
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();

        return CategoryResource::collection($categories);
    }

    /**
     * Create a new category.
     *
     * This method is used to store a new category in the database.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->validated());

        return new CategoryResource($category);
    }

    /**
     * Display the specified category.
     *
     * This method is used to show a specific category by its ID.
     */
    public function show(int $categoryId)
    {
        $category = $this->categoryRepository->find($categoryId);

        return new CategoryResource($category);
    }

    /**
     * Update the specified category.
     *
     * This method is used to update an existing category in the database.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $this->categoryRepository->update($category, $request->validated());

        return new CategoryResource($category);
    }

    /**
     * Remove the specified category.
     *
     * This method is used to delete a category from the database.
     * It will return a 204 No Content response upon successful deletion.
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category);

        return response()->noContent();
    }
}
