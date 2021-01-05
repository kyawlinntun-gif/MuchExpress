<?php

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $categories->each(function ($category) {
            factory(Menu::class, 3)->create(['category_id' => $category->id]);
        });
    }
}
