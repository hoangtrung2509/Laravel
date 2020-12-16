<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::all()->random()->id,//lấy danh sách user rồi chọn ngẫu nhiên id để thêm vào bảng articles
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(random_int(3, 5))
        ];
    }
}
