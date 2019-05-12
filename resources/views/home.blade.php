@extends('layouts.app')

@section('styles')
    <style type="text/css">
        .body_ellipsis{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('content')
    @if ($articles)
        @foreach ($articles as $article)
            <h3>{{ $article->title }}</h3>
            <p class="body_ellipsis">{!! $article->content !!}</p>
            <a href="{{ url('article/'.$article->id) }}" style="float: right">@lang('view.Read More')</a>
            <br>
        @endforeach
        {{ $articles->links() }}
    @else
        <div class="alert alert-success">@lang('view.No Articles')</div>
    @endif
@endsection
