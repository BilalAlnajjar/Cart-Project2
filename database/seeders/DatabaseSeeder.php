<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $images = glob(public_path('images/*.*')); // select all image in images file
        foreach($images as $image){
            unlink($image); // delete image
        }
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
    }
}
