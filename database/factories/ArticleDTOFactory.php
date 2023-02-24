<?php

namespace Database\Factories;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleDTOFactory extends Factory
{
    /**
     * @var int
     */
    private int $userIdIncrement = 1;

    /**
     * @var string
     */
    protected $model = ArticleDTO::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->userIdIncrement++ , // 加算代入
            'title'   => $this->faker->realText(50),
        ];
    }
}
