<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SeedeerCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $categories=array(
            'Birds',
            'Cats',
            'Dogs',
            'Fish',
            'Horse',
            'Rabbit',
            'Snake'
        );
        $date=Carbon::create(2018,11,12);
        foreach ($categories as $category){

            $posts[]=[
                'name'=>$category,
                'created_at'=>clone($date),
                'updated_at'=>clone($date),

            ];
        }

        DB::table('categories')->insert($posts);
    }
}
