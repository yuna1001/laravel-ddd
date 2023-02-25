<?php

namespace App\Domain\Article\ValueObjects;

use App\Domain\ValueObject;

/**
 * 記事タイトルクラス
 */
final class ArticleWriterName extends ValueObject
{
    /**
     * @var string
     */
    protected string $writerName;

    /**

     * @param string $writerName
     */
    public function __construct(string $writerName)
    {
        $this->writerName = $writerName;
    }
}
