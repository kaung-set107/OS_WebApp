<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductSave;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=>'User',
            'image'=>'images/2.jpg',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('password'),
        ]);

            User::create([
            'name'=>'Admin',
            'image'=>'images/2.jpg',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory(10)->create();
        Product::factory(30)->create();
        ProductCart::factory(10)->create();
        ProductOrder::factory(10)->create();
        ProductSave::factory(5)->create();
        
        
    }
}