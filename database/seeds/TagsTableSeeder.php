<?php
use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag = new Tag();
        $tag->nom = "#humour";
        $tag->save();

        $tag = new Tag();
        $tag->nom ="#jaune";
        $tag->save();

        $tag = new Tag();
        $tag->nom ="#vert";
        $tag->save();

    }
}
