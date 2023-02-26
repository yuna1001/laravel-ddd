<?php

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as ArticleRepositoryInterface;
use App\Domain\Article\Ids\ArticleId;
use App\Infrastructure\Article\DTOs\InMemoryArticleDTO;
use App\Infrastructure\Repository;

/**
 * 記事リポジトリ実装クラス
 * 
 * DB・ORMを使わずエンティティに変換します
 */
final class InMemoryArticleRepository extends Repository implements ArticleRepositoryInterface
{
    /**
     * @var InMemoryArticleDTO
     */
    private InMemoryArticleDTO $articleDTO;

    /**
     * @param ArticleDTO $articleDTO
     */
    public function __construct(InMemoryArticleDTO $articleDTO)
    {
        $this->articleDTO = $articleDTO;
    }

    /**
     * @param  ArticleId $articleId
     * @return Article|null
     */
    public function findById(ArticleId $articleId): ?Article
    {
        return $this->articleDTO->toArticle($articleId->id);
    }
}
