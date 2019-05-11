<?php

namespace App\Repositories\Eloquent;

use App\Entities\Comment;
use Illuminate\Support\Facades\DB;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\CommentRepository;


/**
 * Class CommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }

    public function createComment($input)
    {  
        $data = $this->model->create($input);
        return $data;
    }
    
}