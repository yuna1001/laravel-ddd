<?php

namespace App\Domain\Article\Entities;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Ids\ArticleWriterId;
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
     * @var ArticleWriterId
     */
    private ArticleWriterId $articleWriterId;

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
     * @param ArticleWriterId   $articleWriterId
     * @param ArticleWriterName $articleWriterName
     * @param ArticleTitle      $articleTitle
     * @param ArticleContent    $articleContent
     */
    private function __construct( // 外から呼び出せないようにするため
        ArticleId $articleId,
        ArticleWriterId $articleWriterId,
        ArticleWriterName $articleWriterName,
        ArticleTitle $articleTitle,
        ArticleContent $articleContent
    ) {
        // 不変な属性
        $this->id                = $articleId;
        $this->articleWriterId   = $articleWriterId;
        $this->articleWriterName = $articleWriterName;

        // 可変な属性
        $this->articleTitle   = $articleTitle;
        $this->articleContent = $articleContent;
    }

    /**
     * 新しい記事を作成する
     * 
     * @param  ArticleWriterId   $articleWriterId
     * @param  ArticleWriterName $articleWriterName
     * @param  ArticleTitle      $articleTitle
     * @param  ArticleContent    $articleContent
     * @return Article
     */
    public static function create(ArticleWriterId $articleWriterId, ArticleWriterName $articleWriterName, ArticleTitle $articleTitle, ArticleContent $articleContent)
    {
        return new Article(
            new ArticleId(1), // TODO 採番する
            $articleWriterId,
            $articleWriterName,
            $articleTitle,
            $articleContent,
        );
    }
}
