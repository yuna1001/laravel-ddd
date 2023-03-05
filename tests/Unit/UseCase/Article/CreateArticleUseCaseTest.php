<?php

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleWriterId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleWriterName;
use Tests\TestCase;

class CreateArticleUseCaseTest extends TestCase
{
    public function execute(ArticleWriterId $articleWriterId, ArticleWriterName $articleWriterName, ArticleTitle $articleTitle, ArticleContent $articleContent)
    {
        $article = Article::create(
            $articleWriterId,
            $articleWriterName,
            $articleTitle,
            $articleContent
        );

        // TODO リポジトリ呼び出す
    }
}