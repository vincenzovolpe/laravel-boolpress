<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mettiamo nella variabile l'array creato nel file tags.php creato nella cartella config
        $categories = config('category.category_db');
        foreach ($categories as $category) {
            // Creo un nuovo oggetto Category
            $nuova_category = new Category();

            $nuova_category->fill($category);

            $nuova_category->save();
        }
    }
}
