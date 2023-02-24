<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * DIリポジトリサービスプロバイダクラス
 */
class DiRepositoryServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにクラスをバインドします．
     *
     * インターフェースリポジトリと実装リポジトリをバインドし，実装リポジトリのインスタンスをリゾルブします．
     * これにより，コントローラでインターフェースリポジトリを宣言すると，実装リポジトリの依存オブジェクト注入が自動で実行されます．
     *
     * @return void
     */
    public function register()
    {
        $binds = [
            \App\Domain\Article\Repositories\ArticleRepository::class => \App\Infrastructure\Article\Repositories\ArticleRepository::class, // 記事リポジトリ
        ];

        foreach ($binds as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
