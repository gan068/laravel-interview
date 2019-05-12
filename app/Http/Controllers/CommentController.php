<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article_id = $request->input('article_id');
        $comment = $request->input('comment');
        $error_msg = '';

        if (!$article_id) {
            $error_msg .= trans('view.Something wrong. Please contact the system administrator.').'<br>';
            return back()->withInput($request->input())->with('error_msg', $error_msg);
        }

        if (!$comment) {
            $error_msg .= trans('view.Must have the comment!');
            return back()->with('error_msg', $error_msg);
        }

        $input = [
            'content' => $comment,
            'article_id' => $article_id
        ];
        $this->commentService->newComment($input);
        return back()->with('success_msg', trans('view.You successfully leave a message!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
