<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     title="Product",
 *     description="Product resource",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="user_id", type="integer", example=1),
 *         @OA\Property(property="name", type="string", example="Laptop Pro"),
 *         @OA\Property(property="description", type="string", example="High-performance laptop", nullable=true),
 *         @OA\Property(property="price", type="string", example="1299.99"),
 *         @OA\Property(property="stock", type="integer", example=50),
 *         @OA\Property(property="image", type="string", example="/images/product.jpg", nullable=true),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2026-02-06T10:30:00Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2026-02-06T10:30:00Z")
 *     }
 * )
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
