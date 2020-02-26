<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mettiamo nella variabile l'array creato nel file tags.php creato nella cartella config
        $tags = config( 'tags.tag_db');
        foreach ($tags as $tag) {
            // Creo un nuovo oggetto Tag
            $nuovo_tag = new Tag();

            $nuovo_tag->fill($tag);

            $nuovo_tag->save();
        }
    }
}
