<?php

namespace App\Domain\Article\Entities;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleContent;
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
     * @var ArticleContent
     */
    private ArticleContent $articleContent;

    /**
     * @param ArticleId      $articleId
     * @param ArticleTitle   $articleTitle
     * @param ArticleContent $articleContent
     */
    public function __construct(ArticleId $articleId, ArticleTitle $articleTitle, ArticleContent $articleContent)
    {
        $this->id             = $articleId;
        $this->articleTitle   = $articleTitle;
        $this->articleContent = $articleContent;
    }
}
