<?php

namespace App\Domain\Article\ValueObjects;

use App\Domain\ValueObject;

/**
 * 記事タイトルクラス
 */
final class ArticleTitle extends ValueObject
{
    const ARTICLE_TITLE_MAX_LENGTH = 20;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        if (strlen($title) > self::ARTICLE_TITLE_MAX_LENGTH) {
            throw new \Exception('記事タイトルは20文字以下で入力してください');
        }

        $this->title = $title;
    }
}
