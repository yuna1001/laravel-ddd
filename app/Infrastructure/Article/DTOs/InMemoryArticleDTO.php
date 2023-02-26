<?php

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Ids\ArticleWriterId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleWriterName;
use Faker\Factory;

/**
 * 記事DTOクラス
 */
class InMemoryArticleDTO
{
    /**
     * @param  int $articleId
     * @param  int $writerId
     * @return Article
     */
    public function toArticle(int $articleId = 1, int $writerId = 1): Article
    {
        $faker = Factory::create();

        return new Article(
            new ArticleId($articleId),
            new ArticleWriterId($writerId),
            new ArticleWriterName($faker->name),
            new ArticleTitle($faker->text(50)),
            new ArticleContent($faker->text(200))
        );
    }
}
