<?php

namespace Database\Seeders;
use App\Models\Plan;

use App\Models\User;
use App\Models\Video;

use App\Models\Course;
use App\Models\Playlist;
use App\Models\CoursePlan;
use Illuminate\Database\Seeder;
use Database\Seeders\PlaylistSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Playlist::factory(10)->create();
        User::factory(5)->create();
        Video::factory(5)->create();
        // seeder for Course
        Course::create([
            'name' => "HTML",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "html.png"
        ]);

        Course::create([
            'name' => "CSS",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "css.png"
        ]);

        Course::create([
            'name' => "Python",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "phython.png"
        ]);

        Course::create([
            'name' => "MySQL",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "mysql.png"
        ]);

        Course::create([
            'name' => "JavaScript",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "js.png"
        ]);

        Course::create([
            'name' => "C++",
            'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.",
            'image' => "cpp.png"
        ]);




        // seeder for Plan
        Plan::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.',
            'name' => "All Courses",
            'price' => 300000,
            'duration' => '+1 year'
        ]);

        Plan::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.',
            'name' => "Web Programming",
            'price' => 100000,
            'duration' => '+1 year'
        ]);


        Plan::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.',
            'name' => "HTML Master",
            'price' => 50000,
            'duration' => '6 month'
        ]);

        Plan::create([
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam consequuntur eveniet, voluptatibus eum nulla saepe dolorem. Cupiditate, animi voluptate non omnis quo explicabo exercitationem obcaecati magni placeat, nam id fugit.',
            'name' => "Data Science",
            'price' => 200000,
            'duration' => '1 year'
        ]);

        
        // CoursePlan::create([
        //     'plan_id' => 1,
        //     'course_id' => 1
        // ]);

        // CoursePlan::create([
        //     'plan_id' => 1,
        //     'course_id' => 2
        // ]);
    }
}