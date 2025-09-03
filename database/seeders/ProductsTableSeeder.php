<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Big Mac',
                'description' => 'The one and only McDonald\'s Big Mac®. Two 100% pure beef patties and Big Mac® sauce sandwiched between a sesame seed bun.',
                'price' => 5.99,
                'category' => 'food',
                'is_active' => true,
            ],
            [
                'name' => 'Quarter Pounder with Cheese',
                'description' => 'Each Quarter Pounder with Cheese burger features a ¼ lb.* of 100% fresh beef that’s hot, deliciously juicy and cooked when you order.',
                'price' => 4.79,
                'category' => 'food',
                'is_active' => true,
            ],
            [
                'name' => 'McChicken',
                'description' => 'It’s a classic for a reason. Savor the satisfying crunch of our juicy chicken patty, topped with shredded lettuce and just the right amount of creamy mayonnaise, all served on a perfectly toasted bun.',
                'price' => 3.99,
                'category' => 'food',
                'is_active' => true,
            ],
            [
                'name' => 'French Fries',
                'description' => 'McDonald\'s World Famous Fries® are made with premium potatoes such as the Russet Burbank and the Shepody.',
                'price' => 2.49,
                'category' => 'food',
                'is_active' => true,
            ],
            [
                'name' => 'Coca-Cola',
                'description' => 'Enjoy the delicious, refreshing taste of Coca-Cola®.',
                'price' => 1.99,
                'category' => 'drink',
                'is_active' => true,
            ],
            [
                'name' => 'Iced Coffee',
                'description' => 'Our Iced Coffee is made with 100% Arabica beans, cream and your choice of flavored coffee syrup—caramel, hazelnut, French vanilla and sugar-free French vanilla.',
                'price' => 2.29,
                'category' => 'drink',
                'is_active' => true,
            ],
            [
                'name' => 'Apple Pie',
                'description' => 'McDonald\'s Baked Apple Pie recipe features 100% American-grown apples, and a lattice crust that\'s baked to perfection and topped with sprinkled sugar.',
                'price' => 1.49,
                'category' => 'dessert',
                'is_active' => true,
            ],
            [
                'name' => 'McFlurry with OREO Cookies',
                'description' => 'The McDonald\'s McFlurry® with OREO® Cookies is a sweet treat with vanilla soft serve, OREO® cookie pieces and a chocolatey syrup.',
                'price' => 3.29,
                'category' => 'dessert',
                'is_active' => true,
            ],
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}