@extends('layouts.app')

@section('content')
<h3>@lang('view.New Article')</h3>
<form action="{{ action('ArticleController@store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title">@lang('view.Title'):</label>
        <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="content">@lang('view.Content'):</label>
        <textarea class="form-control" rows="15" id="content" name="content" required> {{ old('content') }} </textarea>
    </div>
    <button type="submit" class="btn btn-default" style="float: right">@lang('view.Submit')</button>
</form>
@endsection