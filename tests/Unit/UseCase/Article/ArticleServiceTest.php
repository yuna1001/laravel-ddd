<?php

namespace Tests\Unit\UseCase\Article;

use App\Infrastructure\Article\Repositories\InMemoryArticleRepository;
use App\UseCase\Article\Services\ArticleService;
use App\UseCase\Article\Inputs\ArticleShowInput;
use App\Domain\Article\Repositories\ArticleRepository;
use Tests\TestCase;

class ArticleServiceTest extends TestCase
{
    public function testShowArticle()
    {
        app()->bind(ArticleRepository::class, InMemoryArticleRepository::class);
        $articleService = app()->make(ArticleService::class);

        $id = 1;
        $articleShowInput = new ArticleShowInput($id);
        $article = $articleService->showArticle($articleShowInput);

        $this->assertEquals($id, $article->toArray()['id']);
    }
}