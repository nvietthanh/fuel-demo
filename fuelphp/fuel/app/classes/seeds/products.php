<?php

class Seeds_Products
{
    public static function run()
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'image_path' => '/image-test.png',
                'price' => 32990000,
                'category_id' => 1,
                'quantity' => 100,
                'description' => 'Flagship Apple smartphone',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'image_path' => '/image-test.png',
                'price' => 28990000,
                'category_id' => 2,
                'quantity' => 310,
                'description' => 'High-end Android phone',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'name' => 'MacBook Air M3',
                'image_path' => '/image-test.png',
                'price' => 34990000,
                'category_id' => 3,
                'quantity' => 500,
                'description' => 'Lightweight Apple laptop',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ];

        foreach ($products as $product) {
            \DB::insert('products')->set($product)->execute();
        }

        echo "✔ Seeded products\n";
    }
}
