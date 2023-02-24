<?php

namespace App\Domain\Article\Repositories;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Repository;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{
    /**
     * @param ArticleId $id
     * @return Article|null
     */
    public function findById(ArticleId $id): ?Article;
}
