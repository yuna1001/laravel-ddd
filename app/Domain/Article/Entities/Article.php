<?php

namespace App\Domain\Article\Entities;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Entity;
use App\Traits\ImmutableTrait;

/**
 * 記事クラス
 *
 * ドメイン貧血症にならないように注意してください．
 */
final class Article extends Entity
{
    use ImmutableTrait;

    /**
     * @var ArticleTitle
     */
    private ArticleTitle $articleTitle;

    /**
     * @param ArticleId      $articleId
     * @param ArticleTitle   $articleTitle
     */
    public function __construct(ArticleId $articleId, ArticleTitle $articleTitle)
    {
        $this->id           = $articleId;
        $this->articleTitle = $articleTitle;
    }
}
