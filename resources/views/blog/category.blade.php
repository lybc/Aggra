@extends('blog.layout')

@section('content')
    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('/imgs/daniel-leone-185834-unsplash.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1>你好！伙计！</h1>
                        <h3>A Badass Bootstrap 4 UI Kit based on Material Design.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="section section-basic">
            @foreach($posts as $post)
                <div class="container">
                    <div class="title">
                        <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </h4>
                        {!! get_description($post->display_content) !!}
                        {{--<p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>--}}
                        {{--<p> Don't forget, You're Awesome!</p>--}}
                        <div class="media-footer">
                            <a href="{{ $post->url }}" class="btn btn-primary btn-link" style="padding-left: 0px">
                                <i class="material-icons">arrow_right_alt</i> More
                            </a>
                            {{--<a href="#pablo" class="btn btn-danger btn-link float-right">--}}
                            {{--<i class="material-icons">favorite</i> 243--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
