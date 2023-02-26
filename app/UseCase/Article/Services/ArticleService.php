<?php

namespace App\UseCase\Article\Services;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\Writer\Ids\WriterId;
use App\Exceptions\UnauthorizedAccessException;
use App\UseCase\Article\Inputs\ArticleShowInput;
use App\UseCase\Article\Outputs\ArticleShowOutput;

/**
 * 記事ユースケースクラス
 */
class ArticleService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param  ArticleShowInput $input
     * @return ArticleShowOutput
     * @throws UnauthorizedAccessException
     */
    public function showArticle(ArticleShowInput $input): ArticleShowOutput
    {
        $articleId = new ArticleId($input->id);
        $article   = $this->articleRepository->findById($articleId);

        return new ArticleShowOutput(
            $article->id->id,
            $article->articleTitle->title,
            $article->articleContent->content,
            $article->articleWriterName->writerName,
        );
    }
}