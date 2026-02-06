<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderItemSeeder extends Seeder {
    public function run(): void {
        $products = Product::all();

        Order::all()->each(function ($order) use ($products) {
            for ($i = 0; $i < 3; $i++) {
                OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $products->random()->id,
                ]);
            }
        });
    }
}
