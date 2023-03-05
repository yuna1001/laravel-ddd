<?php

use App\Domain\Article\ValueObjects\ArticleTitle;
use Illuminate\Support\Str;
use Tests\TestCase;

class ArticleTitleTest extends TestCase
{
    /**
     * @test
     */
    public function _20文字以下の値を渡すと、正常にインスタンスが生成される()
    {
        $sample_text  = Str::random(20);
        $articleTitle = new ArticleTitle($sample_text);
        $this->assertEquals($sample_text, $articleTitle->title);
    }

    /**
     * @test
     */
    public function _21文字以上の値を渡すと、例外が発生する()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('記事タイトルは20文字以下で入力してください');

        $sample_text = Str::random(21);
        new ArticleTitle($sample_text);
    }
}