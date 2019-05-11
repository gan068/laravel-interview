<?php

namespace App\Services;

use App\Entities\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\ArticleRepository;


class ArticleService
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function newArticle($input)
    {
        $data = $this->articleRepository->createArticle($input);

        return $data->id;
    }

    public function getArticles()
    {
        $data = $this->articleRepository->getArticlesWithPaginate();

        return $data;
    }

    public function getArticleDataById($article_id)
    {
        $data = $this->articleRepository->getArticleWithCommentsById($article_id);
        return $data;
    }
}