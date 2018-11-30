@extends('blog.layout')
@section('title', $post->title)

@section('styles')
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/atom-one-dark.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection

<div class="container-fluid title-area">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center title-content">
            <h1>{{ $post->title }}</h1>
            {{--<h4>The last 48 hours of my life were total madness. This is what I did.</h4>--}}
        </div>
    </div>
</div>

{{--<div class="container" style="padding-top: 100px">--}}
    {{--<div class="row">--}}
        {{--<h1 class="title">{{ $post->title }}</h1>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="container post-content">
                <article class="article">
                    {!! $post->display_content !!}
                </article>
            </div>

        </div>
        <div class="col-3 toc">
            目录：table of content
        </div>
    </div>
</div>
