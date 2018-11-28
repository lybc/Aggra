@extends('blog.layout')

@section('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/atom-one-dark.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection

<div class="container" style="padding-top: 100px">
    <div class="row">
        <h1 class="title">{{ $post->title }}</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <article class="article">
            {!! $post->display_content !!}
        </article>
    </div>
</div>
