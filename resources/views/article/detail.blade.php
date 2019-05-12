@extends('layouts.app')

@section('content')
    <h3>{{ $data->title }}</h3>
    <p>{{ $data->content }}</p>
    <p style="float: right;">@lang('view.Created at'){{ $data->created_at }}</p>
    <br>
    <br>
    <hr>
    <form action="{{ action('CommentController@store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="article_id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="comment">@lang('view.Comment'):</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" required> {{ old('comment') }} </textarea>
        </div>
        <button type="submit" class="btn btn-default" style="float: right">@lang('view.Submit')</button>
    </form>

    @if (sizeof($data->comments))
        <br>
        <h4>@lang('view.Comments')</h4>
        @foreach ($data->comments as $comment)
        <p>{{ $comment->content }}</p>
        <p style="float: right;">@lang('view.Commented at'){{ $comment->created_at }}</p>
        <br>
        @endforeach
    @endif

@endsection