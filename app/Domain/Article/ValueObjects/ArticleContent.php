<?php

namespace App\Domain\Article\ValueObjects;

use App\Domain\ValueObject;

/**
 * 記事コンテンツクラス
 */
final class ArticleContent extends ValueObject
{
    /**
     * @var string
     */
    protected string $content;

    /**

     * @param string $title
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
