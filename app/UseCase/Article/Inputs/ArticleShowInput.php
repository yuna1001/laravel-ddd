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
    protected int $authId;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}