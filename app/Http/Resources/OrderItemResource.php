<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="OrderItem",
 *     type="object",
 *     title="OrderItem",
 *     description="Order item resource",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="order_id", type="integer", example=1),
 *         @OA\Property(property="product_id", type="integer", example=1),
 *         @OA\Property(property="quantity", type="integer", example=2),
 *         @OA\Property(property="price", type="string", example="1299.99"),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2026-02-06T10:30:00Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2026-02-06T10:30:00Z")
 *     }
 * )
 */
class OrderItemResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
