<?php

namespace App\UseCase\Article\Inputs;

use App\UseCase\ShowInput;

final class ArticleShowInput extends ShowInput
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $writerId;

    /**
     * @param int $id
     * @param int $writerId
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}