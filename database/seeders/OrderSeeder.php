<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::query()->first();

        if (! $product) {
            return;
        }

        $customer = User::query()->firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Customer Demo',
                'password' => 'password',
            ]
        );

        $item = [
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => 1,
            'subtotal' => $product->price,
        ];

        $order = Order::query()->firstOrCreate(
            [
                'user_id' => $customer->id,
                'status' => 'paid',
            ],
            ['total_amount' => $item['subtotal']]
        );

        OrderItem::query()->firstOrCreate(
            [
                'order_id' => $order->id,
                'product_id' => $product->id,
            ],
            $item
        );
    }
}
