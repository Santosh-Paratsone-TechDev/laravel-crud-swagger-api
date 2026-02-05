<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder {
    public function run(): void {
        $customer = User::where('role', 'customer')->first();

        Order::factory()->count(10)->create([
            'user_id' => $customer->id,
        ]);
    }
}
