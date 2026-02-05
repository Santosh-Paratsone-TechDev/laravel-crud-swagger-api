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
class ProductController extends Controller
{
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
    public function index(Request $request)
    {
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
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Create a new product",
     *     description="Create a new product (authenticated users only). User ID defaults to 1.",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","price","stock"},
     *             @OA\Property(property="name", type="string", example="Laptop Pro", maxLength=255),
     *             @OA\Property(property="description", type="string", example="High-performance laptop", nullable=true),
     *             @OA\Property(property="price", type="number", format="float", example=1299.99),
     *             @OA\Property(property="stock", type="integer", example=50),
     *             @OA\Property(property="image", type="string", example="/images/laptop.jpg", maxLength=500, nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully with user_id=1",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Bearer token missing or invalid"
     *     )
     * )
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = 1; // Default user_id
        $product = Product::create($data);

        return response()->json(
            new ProductResource($product),
            201
        );
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Update a product",
     *     description="Update an existing product (authenticated users only). User ID defaults to 1.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Laptop Pro Max", maxLength=255),
     *             @OA\Property(property="description", type="string", example="Updated description", nullable=true),
     *             @OA\Property(property="price", type="number", format="float", example=1199.99),
     *             @OA\Property(property="stock", type="integer", example=45),
     *             @OA\Property(property="image", type="string", example="/images/laptop-max.jpg", maxLength=500, nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully with user_id=1",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Bearer token missing or invalid"
     *     )
     * )
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['user_id'] = 1; // Default user_id
        $product->update($data);

        return new ProductResource($product);
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Delete a product",
     *     description="Delete an existing product (authenticated users only). Product user_id is set to 1 before deletion.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Product deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Bearer token missing or invalid"
     *     )
     * )
     */
    public function destroy(Product $product)
    {
        $product->update(['user_id' => 1]); // Ensure user_id is 1
        $product->delete();

        return response()->noContent();
    }
}
