<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 🍫 甜可頌
        $sweetProducts = [
            ['name' => '巧克力可頌', 'description' => '濃郁巧克力內餡，香甜不膩', 'image' => 'images/products/chocolate.jpg', 'type' => '甜'],
            ['name' => '草莓可頌',   'description' => '新鮮草莓風味，酸甜可口', 'image' => 'images/products/strawberry.jpg', 'type' => '甜'],
            ['name' => '抹茶可頌',   'description' => '日式抹茶香氣，回甘順口', 'image' => 'images/products/matcha.jpg', 'type' => '甜'],
            ['name' => '芋頭可頌',   'description' => '綿密芋頭餡，台式經典',   'image' => 'images/products/taro.jpg', 'type' => '甜'],
            ['name' => '紅豆可頌',   'description' => '傳統紅豆餡，甜而不膩',   'image' => 'images/products/redbean.jpg', 'type' => '甜'],
            ['name' => '綠豆可頌',   'description' => '清爽綠豆餡，口感細緻',   'image' => 'images/products/greanbean.jpg', 'type' => '甜'],
        ];

        // 🥓 鹹可頌
        $savoryProducts = [
            ['name' => '豬肉可頌', 'description' => '香煎豬肉，鹹香滿足', 'image' => 'images/products/pork.jpg', 'type' => '鹹'],
            ['name' => '雞肉可頌', 'description' => '嫩煎雞肉，清爽不油', 'image' => 'images/products/chicken.jpg', 'type' => '鹹'],
            ['name' => '牛肉可頌', 'description' => '厚切牛肉，濃郁多汁', 'image' => 'images/products/beef.jpg', 'type' => '鹹'],
            ['name' => '鮪魚可頌', 'description' => '經典鮪魚沙拉',         'image' => 'images/products/tuna.jpg', 'type' => '鹹'],
            ['name' => '薯餅可頌', 'description' => '酥脆薯餅，人氣首選',   'image' => 'images/products/hashbrown.jpg', 'type' => '鹹'],
            ['name' => '起司蛋可頌', 'description' => '起司搭配嫩蛋，香濃滑順', 'image' => 'images/products/cheese-egg.jpg', 'type' => '鹹'],
        ];

        foreach (array_merge($sweetProducts, $savoryProducts) as $product) {
            Product::create($product);
        }
    }
}
