<?php

namespace App\Domain\Article\Entities;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleWriterName;
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
     * @var ArticleWriterName
     */
    private ArticleWriterName $articleWriterName;

    /**
     * @var ArticleTitle
     */
    private ArticleTitle $articleTitle;

    /**
     * @var ArticleContent
     */
    private ArticleContent $articleContent;

    /**
     * @param ArticleId         $articleId
     * @param ArticleWriterName $articleWriterName
     * @param ArticleTitle      $articleTitle
     * @param ArticleContent    $articleContent
     */
    public function __construct(ArticleId $articleId, ArticleWriterName $articleWriterName, ArticleTitle $articleTitle, ArticleContent $articleContent)
    {
        $this->id                = $articleId;
        $this->articleWriterName = $articleWriterName;
        $this->articleTitle      = $articleTitle;
        $this->articleContent    = $articleContent;
    }
}
