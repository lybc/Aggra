<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/ui.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @yield('styles')
    <script src="{{ mix('/js/ui.js') }}"></script>
    <title> {{ config('app.name') }} | @yield('title')</title>
</head>
<body class="index-page sidebar-collapse">
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @if(! empty($menus))
                    @foreach($menus as $menu)
                        @php $hasChild = $menu->allChildren->isNotEmpty(); @endphp
                        <li class="nav-item @if($hasChild) dropdown @endif">
                            <a href="{{ $menu->link }}"
                               target="{{ $menu->target }}"
                               class="nav-link @if($hasChild) dropdown-toggle @endif"
                               @if($hasChild) data-toggle="dropdown" @endif >
                                {{ $menu->name }}
                            </a>
                            @if($hasChild)
                            <div class="dropdown-menu dropdown-with-icons">
                                @foreach($menu->allChildren as $subMenu)
                                <a href="{{ $subMenu->link }}" target="{{ $subMenu->target }}" class="dropdown-item">
                                    {{ $subMenu->name }}
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')


{{--<footer class="footer" data-background-color="black">--}}
    {{--<div class="container">--}}
        {{--<nav class="float-left">--}}
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<a href="https://www.creative-tim.com">--}}
                        {{--Creative Tim--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="https://creative-tim.com/presentation">--}}
                        {{--About Us--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="http://blog.creative-tim.com">--}}
                        {{--Blog--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="https://www.creative-tim.com/license">--}}
                        {{--Licenses--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
        {{--<div class="copyright float-right">--}}
            {{--© 2018, made with <i class="material-icons">favorite</i> by--}}
            {{--<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<footer class="footer footer-black footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <h5>About Us</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Presentation
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Market</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Sales FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                How to Register
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Sell Goods
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Receive Payment
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Transactions Issues
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Affiliates Program
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Social Feed</h5>
                    <div class="social-feed">
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>How to handle ethical disagreements with your clients.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>The tangible benefits of designing at 1x pixel density.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-facebook-square"></i>
                            <p>A collection of 25 stunning sites that you can use for inspiration.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="social-buttons">
                        <li>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <h5>Numbers Don't Lie</h5>
                    <h4>14.521
                        <small>Freelancers</small>
                    </h4>
                    <h4>1.423.183
                        <small>Transactions</small>
                    </h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright pull-center">
            <p>
                Coding by Lybc
                <i class="material-icons" style="color: #e27575;">favorite</i>
                赣ICP备17012171号-2
            </p>

        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
        //init DateTimePickers
        // materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();
    });


    function scrollToDownload() {
        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }


    $(document).ready(function() {
        // $('#facebook').sharrre({
        //     share: {
        //         facebook: true
        //     },
        //     enableHover: false,
        //     enableTracking: false,
        //     enableCounter: false,
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('facebook');
        //     },
        //     template: '<i class="fab fa-facebook-f"></i> Facebook',
        //     url: 'https://demos.creative-tim.com/material-kit/index.html'
        // });

        // $('#googlePlus').sharrre({
        //     share: {
        //         googlePlus: true
        //     },
        //     enableCounter: false,
        //     enableHover: false,
        //     enableTracking: true,
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('googlePlus');
        //     },
        //     template: '<i class="fab fa-google-plus"></i> Google',
        //     url: 'https://demos.creative-tim.com/material-kit/index.html'
        // });

        // $('#twitter').sharrre({
        //     share: {
        //         twitter: true
        //     },
        //     enableHover: false,
        //     enableTracking: false,
        //     enableCounter: false,
        //     buttons: {
        //         twitter: {
        //             via: 'CreativeTim'
        //         }
        //     },
        //     click: function(api, options) {
        //         api.simulateClick();
        //         api.openPopup('twitter');
        //     },
        //     template: '<i class="fab fa-twitter"></i> Twitter',
        //     url: 'https://demos.creative-tim.com/material-kit/index.html'
        // });

    });
</script>
</body>
</html>
