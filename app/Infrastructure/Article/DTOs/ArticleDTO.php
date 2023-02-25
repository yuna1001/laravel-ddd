<?php

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleWriterName;
use App\Infrastructure\Writer\DTOs\WriterDTO;
use Database\Factories\ArticleDTOFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "article";

    /**
     * @var array
     */
    protected $cast = [
        'id'        => 'integer',
        'writer_id' => 'integer',
    ];

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'writer_id',
        'title',
        'content',
    ];

    public function writer()
    {
        return $this->belongsTo(WriterDTO::class);
    }

    /**
     * DTOを記事エンティティに変換します．
     *
     * @return Article
     */
    public function toArticle(): Article
    {
        return new Article(
            new ArticleId($this->id),
            new ArticleWriterName($this->writer->name),
            new ArticleTitle($this->title),
            new ArticleContent($this->content)
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
