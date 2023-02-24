<?php

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;

/**
 * 記事DTOクラス
 */
final class DevArticleDTO
{
    private $id;
    private $title;
    private $content;

    public function find($id)
    {
        $this->id      = $id;
        $this->title   = 'テスト1';
        $this->content = "テストテストテスト\nテストテストテストテストテストテスト";

        return $this;
    }

    /**
     * DTOを記事エンティティに変換します．
     *
     * @return Article
     */
    public function toArticle(): Article
    {
        return new Article(
            new ArticleId($this->id),
            new ArticleTitle($this->title),
            new ArticleContent($this->content)
        );
    }
}
