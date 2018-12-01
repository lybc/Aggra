@extends('blog.layout')
@section('title', $post->title)

@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.4.2/tocbot.min.js"></script>
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/atom-one-dark.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.4.2/tocbot.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection

@section('content')
<div class="post-container">
    <div class="page-header" style="background-image: url('/imgs/annie-spratt-330560-unsplash.jpg')"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <div class="container post">
                    <div class="row">
                        <div class="post-title">
                            <h3>{{ $post->title }}</h3>
                            <h6>发布于 {{ $post->created_at->diffForHumans(now()) }} | {{ $post->views }} Views</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="post-meta">
                            <span class="badge badge-pill badge-info">Info</span>
                            <span class="badge badge-pill badge-info">Info</span>
                            <span class="badge badge-pill badge-info">Info</span>
                            <span class="badge badge-pill badge-info">Info</span>
                        </div>


                    </div>

                    <div class="row">
                        <article class="article">
                            {!! $post->display_content !!}
                        </article>
                    </div>
                </div>


            </div>
            <div class="col-3">
                <div class="toc">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        tocbot.init({
            tocSelector: '.toc',
            contentSelector: '.article',
            listClass: 'nav nav-pills flex-column',
            listItemClass: 'nav-item',
            linkClass: 'nav-link',
            activeLinkClass: 'active',
            offset: 50,
            // scrollSmooth: true,
            scrollSmoothDuration: 1,

        });

        $('.toc').stickySidebar({
            topSpacing: 100,
            bottomSpacing: 60
        })
    })
</script>
@endsection()
