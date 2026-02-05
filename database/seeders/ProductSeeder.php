<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder {
    public function run(): void {
        $vendor = User::where('role', 'vendor')->first();

        Product::factory()->count(20)->create([
            'user_id' => $vendor->id,
        ]);
    }
}
