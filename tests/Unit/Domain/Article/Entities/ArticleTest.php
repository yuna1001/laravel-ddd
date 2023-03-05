<?php

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleWriterId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleWriterName;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * @test
     */
    public function 記事を新規作成すると、引数で指定した値でインスタンスが生成される()
    {
        // given:

        // when:
        $articleWriterId   = new ArticleWriterId(1); // TODO 採番する
        $articleWriterName = new ArticleWriterName('ライター1');
        $articleTitle      = new ArticleTitle('新規タイトル');
        $articleContent    = new ArticleContent('新規コンテンツ');

        $article = Article::create(
            $articleWriterId,
            $articleWriterName,
            $articleTitle,
            $articleContent
        );

        // then:
        $this->assertEquals($articleWriterId->id, $article->articleWriterId->id);
        $this->assertEquals($articleWriterName->writerName, $article->articleWriterName->writerName);
        $this->assertEquals($articleTitle->title, $article->articleTitle->title);
        $this->assertEquals($articleContent->content, $article->articleContent->content);
    }
}