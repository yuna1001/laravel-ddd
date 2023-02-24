<?php

namespace App\UseCase\Article\Outputs;

use App\UseCase\Output;

/**
 * IDに基づく記事取得レスポンスクラス
 */
final class ArticleShowOutput extends Output
{
    /**
     * @var string
     */
    private string $articleTitle;

    /**
     * @param string $articleTitle
     */
    public function __construct(string $articleTitle)
    {
        $this->articleTitle = $articleTitle;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'   => $this->articleTitle,
        ];
    }
}
