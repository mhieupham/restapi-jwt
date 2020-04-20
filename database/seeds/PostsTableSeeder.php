<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_posts')->insert([
            'post_content'=>'test content',
            'post_image'=>rand().'.jpg'
        ]);
    }
}
