<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\ProductFilterRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    public function __construct(protected ProductRepositoryInterface $productRepository) {}


    /**
     * List all products.
     *
     * This method is responsible for displaying a list of all products in the system.
     * It can be used to retrieve product data from the database and return it in a suitable format,
     * such as JSON or HTML.
     *
     * @response AnonymousResourceCollection<LengthAwarePaginator<ProductResource>>
     */
    public function index(ProductFilterRequest $request)
    {
        $products = $this->productRepository->all($request->validated());

        return ProductResource::collection($products);
    }

    /**
     * Create a new product.
     *
     * This method is responsible for storing a new product in the system.
     * It typically involves validating the incoming request data, creating a new product record in the database,
     * and returning the created product as a resource.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->create($request->validated());

        return new ProductResource($product);
    }

    /**
     * Display the specified product.
     *
     * This method is used to show a specific product by its ID.
     * It retrieves the product from the repository and returns it as a resource.
     */
    public function show(int $productId)
    {
        $product = $this->productRepository->find($productId);

        return new ProductResource($product);
    }

    /**
     * Update the specified product.
     *
     * This method is responsible for updating an existing product in the system.
     * It typically involves validating the incoming request data, updating the product record in the database,
     * and returning the updated product as a resource.
     */
    public function update(UpdateProductRequest $request, int $productId)
    {
        $product = $this->productRepository->update($productId, $request->validated());

        return new ProductResource($product);
    }

    /**
     * Delete the specified product.
     *
     * This method is responsible for deleting a product from the system.
     * It typically involves removing the product record from the database.
     */
    public function destroy(int $productId)
    {
        $this->productRepository->delete($productId);

        return response()->noContent();
    }
}
