<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class HomeController extends Controller
{
    private $articleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  $this->articleService->getArticles();
        return view('home', ['articles' => $articles]);
    }
}
