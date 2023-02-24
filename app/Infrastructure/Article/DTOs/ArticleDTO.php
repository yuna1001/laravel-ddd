<?php

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Traits\DTOTrait;
use Database\Factories\ArticleDTOFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends Model
{
    use DTOTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "articles";

    /**
     * @var array
     */
    protected $cast = [
        'id' => 'integer'
    ];

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title',
    ];

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
        );
    }

    /**
     * NOTE:
     * Factoryの名前空間を正しく解決できない．
     * @see https://github.com/laravel/framework/issues/37038
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return ArticleDTOFactory::new();
    }
}
