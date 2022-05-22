<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 5)),
            'desc' => $this->faker->paragraph(),

            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 20))) . '</p>',
            'playlist_id' => 2,
            'file_name' => 'vid' . mt_rand(1, 5) . '.mp4',
            'access_type' => 'free'
        ];
    }
}
