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
        Course::create([
            'name' => "HTML",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'thumb_img' => "html.png"
        ]);
        Course::create([
            'name' => "CSS",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'thumb_img' => "css.png"
        ]);

        Plan::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.',
            'name' => "Web Programming",
            'price' => 100000,
            'duration' => '+1 year'
        ]);

        
        Plan_course::create([
            'plan_id' => 1,
            'course_id' => 1
        ]);

        Plan_course::create([
            'plan_id' => 1,
            'course_id' => 2
        ]);
    }
}
