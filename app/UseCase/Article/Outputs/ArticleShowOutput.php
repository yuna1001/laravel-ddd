<?php

namespace App\UseCase\Article\Outputs;

use App\UseCase\Output;

/**
 * IDに基づく記事取得レスポンスクラス
 */
final class ArticleShowOutput extends Output
{
    /**
     * @var string
     */
    private string $articleTitle;

    /**
     * @var string
     */
    private string $articleContent;

    /**
     * @var string
     */
    private string $articleWriterName;

    /**
     * @param string $articleTitle
     */
    public function __construct(string $articleTitle, string $articleContent, string $articleWriterName)
    {
        $this->articleTitle      = $articleTitle;
        $this->articleContent    = $articleContent;
        $this->articleWriterName = $articleWriterName;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'      => $this->articleTitle,
            'content'    => $this->articleContent,
            'writerName' => $this->articleWriterName,
        ];
    }
}
