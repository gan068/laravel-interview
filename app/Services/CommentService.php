<?php

namespace App\Services;

use App\Entities\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\CommentRepository;


class CommentService
{
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function newComment($input)
    {
        $data = $this->commentRepository->createComment($input);
        return $data->id;
    }
}