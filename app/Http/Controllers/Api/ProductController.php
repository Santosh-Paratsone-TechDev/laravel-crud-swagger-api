<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Products",
 *     description="Product management endpoints"
 * )
 */
class ProductController extends Controller {
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="List all products",
     *     description="Get all products with pagination",
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Items per page",
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of products",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     )
     * )
     */
    public function index(Request $request) {
        $per_page = $request->query('per_page', 15);
        $products = Product::paginate($per_page);

        return ProductResource::collection($products);
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Get product details",
     *     description="Get a specific product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product details",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function show(Product $product) {
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request) {
        $data = $request->validated();
        $data['user_id'] = 1; // Default user_id
        $product = Product::create($data);

        return response()->json(
            new ProductResource($product),
            201
        );
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $data = $request->validated();
        $data['user_id'] = 1; // Default user_id
        $product->update($data);

        return new ProductResource($product);
    }

    public function destroy(Product $product) {
        $product->update(['user_id' => 1]); // Ensure user_id is 1
        $product->delete();

        return response()->noContent();
    }
}
