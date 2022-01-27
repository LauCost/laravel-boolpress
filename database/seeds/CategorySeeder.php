<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['games', 'musica', 'film', 'macchine', 'informatica'];

        foreach ($categories as $category) {
            $_category = new Category();
            $_category->name = $category;
            $_category->slug = Str::slug($_category->name);
            $_category->save();
        }
    }
}
