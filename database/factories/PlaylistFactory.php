<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [          
            'name' => $this->faker->sentence(mt_rand(2, 5)),
            'desc' => $this->faker->paragraph(),

            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 20))) . '</p>',
            'course_id' => mt_rand(1, 5),
        ];
    }
}
