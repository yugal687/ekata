<?php

use App\Model\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'tags'=>'Today Special'
        ]);
        Tag::create([
           'tags'=>'Week Special'
        ]);
    }
}
