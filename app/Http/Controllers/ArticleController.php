<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class ArticleController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $error_msg = '';

        if (!$title) {
            $error_msg .= trans('view.Must have the titile!').'<br>';
        }
        if (!$content) {
            $error_msg .= trans('view.Must have the content!');
        }
        if ($error_msg){
            return back()->withInput($request->input())->with('error_msg', $error_msg);
        }

        $input = [
            'title' => $title,
            'content' => $content
        ];

        $article_id = $this->articleService->newArticle($input);

        if (!$article_id){
            $error_msg = trans('veiw.Something wrong. Please contact the system administrator.');
            return redirect('/')->with('error_msg', $error_msg);
        }

        return redirect('/')->with('success_msg', trans('view.You sucessfully create an article!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $article_id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        $data = $this->articleService->getArticleDataById($article_id);
        return view('article.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
