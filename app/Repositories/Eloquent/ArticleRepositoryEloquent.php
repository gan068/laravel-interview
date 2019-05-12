<?php

namespace App\Repositories\Eloquent;

use App\Entities\Article;
use Illuminate\Support\Facades\DB;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\ArticleRepository;


/**
 * Class ArticleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    public function createArticle($input)
    {  
        $data = $this->model->create($input);
        return $data;
    }
    
    public function getArticlesWithPaginate()
    {
        $data = $this->model->orderBy('created_at', 'desc')->paginate(5);
        return $data;
    }

    public function getArticleWithCommentsById($id)
    {
        $data = $this->model->findOrFail($id);
        return $data;
    }
}