<?php

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as ArticleRepositoryInterface;
use App\Domain\Article\Ids\ArticleId;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Article\DTOs\DevArticleDTO;
use App\Infrastructure\Repository;

/**
 * 記事リポジトリ実装クラス
 */
final class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    /**
     * @var DevArticleDTO
     */
    private DevArticleDTO $articleDTO;

    /**
     * @param DevArticleDTO $articleDTO
     */
    public function __construct(DevArticleDTO $articleDTO)
    {
        $this->articleDTO = $articleDTO;
    }

    /**
     * @param ArticleId $articleId
     * @return Article|null
     */
    public function findById(ArticleId $articleId): ?Article
    {
        $articleDTO = $this->articleDTO
            ->find($articleId->id);

        if (!$articleDTO) {
            return null;
        }

        // DTOのデータをドメインモデルに詰め替えます
        return $articleDTO->toArticle();
    }
}
