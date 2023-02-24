<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\UseCase\Article\Inputs\ArticleShowInput;
use App\UseCase\Article\Services\ArticleService;

final class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(): JsonResponse
    {
        return response()->json();
    }

    public function show(int $id): JsonResponse
    {
        $articleShowInput = new ArticleShowInput($id);
        $article = $this->articleService->showArticle($articleShowInput);

        return response()->json($article->toArray());
    }
}
