<?php

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Ids\ArticleWriterId;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleWriterName;
use App\Infrastructure\Writer\DTOs\WriterDTO;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends Model
{
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
            new ArticleWriterId($this->writer_id),
            new ArticleWriterName($this->writer->name),
            new ArticleTitle($this->title),
            new ArticleContent($this->content)
        );
    }
}
