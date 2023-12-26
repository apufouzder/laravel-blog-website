@extends('layouts.master')

@section('content')
    @php
        $page = 'Home';
    @endphp

    <header class="header-section mb-5"
        style="background-image: url('https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-hero-gradient-bg-green.svg'), url('https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-hero-gradient-bg-purple.svg') ;  background-position: left top, right top; background-size: auto; background-repeat: no-repeat;">
        {{-- Hero section start --}}
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div data-aos="fade-up" class="col-lg-9 pe-lg-4 p-0 mb-5">
                        <div class="wrapper position-relative w-100">
                            <div class="bg-img">
                                <img class="" width="100%" height="100%"
                                    src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-01.jpg"
                                    alt="">
                            </div>
                            <div class="content p-lg-5 position-absolute bottom-0 z-3">
                                <p style="letter-spacing: 4px;" class="text-uppercase mb-4 fw-medium text_color_gray">
                                    Software</p>
                                <h2 class="text-white">Running macOS and Windows 10 on the Same Computer</h2>
                                <div class="d-flex gap-3 mb-4 align-items-center">
                                    <span class="text_color_gray">
                                        <span><i class="bi bi-person-fill"></i></span>
                                        <span class="">winters</span>
                                    </span>
                                    <span class="text_color_gray">
                                        <span><i class="bi bi-calendar2-week"></i></span>
                                        <span>July 7, 2021 </span>
                                    </span>
                                    <span class="text_color_gray">
                                        <span><i class="bi bi-chat-dots"></i></span>
                                        <span>No Comments</span>
                                    </span>
                                </div>
                                <p class="lead text-light fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                                    consequat scelerisque nibh amet,
                                    massa egestas risus, gravida vel amet, imperdiet …</p>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-left" class="col-lg-3 ">
                        <div class="px-1">
                            <div class="mb-3 w-100">
                                <img width="100%"
                                    src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-09.jpg"
                                    alt="">
                            </div>
                            <div class="">
                                @foreach ($categories as $category)
                                    <a href="{{ route('filter_by_category', $category->id) }}"><button
                                            class="btn btn-outline-primary mb-3">{{ $category->name }}</button></a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Hero section end --}}
    </header>

    {{-- Recent post section start --}}
    <section data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pe-4 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Recent Posts</h4>
                    </div>
                    <div class="row border-bottom pb-4">
                        @foreach ($recentPosts as $post)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                                        <img class="img-fluid" width="100%"
                                            src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="tech">
                                    </a>
                                    <small style="left: 1rem; top: 1rem;"
                                        class="text-uppercase bg-white px-2 fw-medium rounded-2 position-absolute d-block ">New</small>
                                </div>
                                <a href="{{ route('single_post_view', $post->id) }}"
                                    class="fw-bold h6 text-decoration-none">{{ $post->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="border px-3 pt-0 pb-5">
                        <span class="bg_color_indigo p-3 rounded-1"><span class="fs-3 text-white"><i
                                    class="bi bi-envelope"></i></span></span>
                        <h4 class="mt-4 fw-bold">Subscribe to Our Newsletter</h4>
                        <p class="text-muted fs-5 fw-normal">gravida aliquet vulputate faucibus tristique odio.</p>
                        <input type="email" class="form-control py-3 mb-4" placeholder="Email address" />
                        <button class="btn btn-primary bg_color_indigo fs-5">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Recent post section end --}}

    {{-- Tech Reviews section start --}}
    <section data-aos="fade-up" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div
                        class="d-flex justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                        <h1>Tech Reviews</h1>
                        <a class="nav-link fs-5 fw-bold" style="color: #6610f2;"
                            href="{{ route('filter_by_category', $reviewsPosts[0]->category_id) }}">More in Tech Reviews <i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    @foreach ($reviewsPosts as $post)
                        <div class="d-flex gap-4 flex-column flex-lg-row align-items-center mb-4 ">
                            <div class="w-100">
                                <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                                    <img class="img-fluid" width="100%"
                                        src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="tech">
                                </a>
                            </div>
                            <div class="pt-2 pe-3">
                                <small style="letter-spacing: 4px;"
                                    class="text-uppercase fw-medium mb-3 d-block text_color_indigo">{{ $post->category_name }}</small>
                                <a href="{{ route('single_post_view', $post->id) }}"
                                    class="fw-bold h4 text-decoration-none">{{ $post->title }}</a>
                                <p class="text-secondary fs-5 fw-normal">
                                    {{-- {{ nl2br(e(Str::limit(strip_tags($post->description), 200))) }}</p> --}}
                                    {!! Str::limit(strip_tags($post->description), 200) !!}</p>
                                <div class="d-flex gap-3 mb-4 align-items-center">
                                    <span class="">
                                        <span><i class="bi bi-person-fill"></i></span>
                                        <span class="">winters</span>
                                    </span>
                                    <span class="">
                                        <span><i class="bi bi-calendar2-week"></i></span>
                                        <span>{{ date('d M Y', strtotime($post->created_at)) }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3">
                    <div>
                        <img class="mb-3" width="100%"
                            src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-promo-potrait-banner-img.jpg"
                            alt="">

                        <hr>

                        <h4 class="fw-bold mb-4">Stay Connected</h4>
                        <div data-aos="zoom-out-left">
                            <div class="d-flex gap-3 mb-4">
                                <span class="fs-4 bg-p text-primary"><i class="bi bi-facebook"></i></span>
                                <div class="lh-1">
                                    <h5>TechWire News</h5>
                                    <span>2M+ Followers</span>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mb-4">
                                <span class="fs-4 bg-p text-danger"><i class="bi bi-instagram"></i></span>
                                <div class="lh-1">
                                    <h5>TechWire News</h5>
                                    <span>2M+ Followers</span>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <span class="fs-4 bg-p text-danger"><i class="bi bi-youtube"></i></span>
                                <div class="lh-1">
                                    <h5>TechWire News</h5>
                                    <span>1M+ Followers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Tech Reviews section end --}}

    {{-- Podcast section start --}}
    <section data-aos="zoom-in-up" class="my-5 pt-5">
        <div class="container">
            <div class="row align-items-center px-3 px-lg-0 pb-lg-0 pb-4 bg_color_cyan rounded-5">
                <div class="col-lg-3 p-0 mb-4 mb-lg-0">
                    <img style="margin-top: -2rem;" width="100%"
                        src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/teh-news-podcast-cta-figure-img.png"
                        alt="podcast">
                </div>
                <div class="col-lg-7">
                    <h5 class="text_color_indigo fw-bold mb-3">TechWire Podcast</h5>
                    <h1>Listen to daily tech news podcast</h1>
                    <p class="text-secondary fs-5 fw-normal">Maecenas potenti non, turpis eget turpis gravida
                        maecenas.</p>
                </div>
                <div class="col-lg-2">
                    <div class="btn btn-primary rounded-5 fs-5 fw-semibold px-4 py-2 bg_color_indigo">Listen Now
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Podcast section end --}}

    {{-- Must Read section start --}}
    <section data-aos="fade-up" data-aos-duration="2000" class="my-5 py-5">
        <div class="container">
            <div class="row">
                <div
                    class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                    <h1 class="fw-bold">Must Read</h1>
                    <a class="nav-link fs-5 fw-bold" style="color: #6610f2;" href="#">View All <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6 p-lg-0 mb-lg-0 mb-3">
                    <div class="wrapper position-relative w-100">
                        <div class="bg-img">
                            <img class="" width="100%" height="100%"
                                src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-iphone.jpg"
                                alt="">
                        </div>
                        <div class="content p-lg-4 position-absolute bottom-0 z-3">
                            <p style="letter-spacing: 4px;" class="text-uppercase mb-4 fw-medium text_color_gray">
                                Software</p>
                            <h2 class="text-white">Running macOS and Windows 10 on the Same Computer</h2>
                            <p class="lead text-light fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                                consequat scelerisque nibh amet,
                                massa egestas risus, gravida vel amet, imperdiet …</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-lg-0">
                    <div class="wrapper position-relative w-100">
                        <div class="bg-img">
                            <img class="" width="100%" height="100%"
                                src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-nvidia.jpg"
                                alt="">
                        </div>
                        <div class="content p-lg-4 position-absolute bottom-0 z-3">
                            <p style="letter-spacing: 4px;" class="text-uppercase mb-4 fw-medium text_color_gray">
                                Software</p>
                            <h2 class="text-white">Running macOS and Windows 10 on the Same Computer</h2>
                            <p class="lead text-light fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                                consequat scelerisque nibh amet,
                                massa egestas risus, gravida vel amet, imperdiet …</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Must Read section end --}}

    {{-- Technology section start --}}
    <section data-aos="fade-up" class="py-5 my-5">
        <div class="container border-1 border-bottom">
            <div
                class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                <h1 class="fw-bold">Technology</h1>
                <a class="nav-link fs-5 fw-bold" style="color: #6610f2;"
                    href="{{ route('filter_by_category', $technologyPosts[0]->category_id) }}">More in Technology <i
                        class="bi bi-arrow-right"></i></a>
            </div>
            <div class="row">
                @foreach ($technologyPosts as $post)
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                            <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="photo">
                            <h3 class="mt-3 fs-4 fw-bold text-black">{{ $post->title }}</h3>
                        </a>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class="">
                                <span><i class="bi bi-person-fill"></i></span>
                                <span class="">winters</span>
                            </span>
                            <span class="">
                                <span><i class="bi bi-calendar2-week"></i></span>
                                {{-- <span>{{ $post->created_at->format('F j, Y') }} </span> --}}
                                <span>{{ date('d M Y', strtotime($post->created_at)) }} </span>
                            </span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal">
                            {{-- {{ nl2br(e(Str::limit(strip_tags($post->description), 200))) }}</p> --}}
                            {!! Str::limit(strip_tags($post->description), 200) !!}</p>
                        {{-- {!!Str::limit($post->description,500)!!}</p> --}}
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Technology section end --}}

    {{-- Gadgets section start --}}
    <section data-aos="fade-up" class="">
        <div class="container">
            <div class="row border-1 border-bottom">
                <div data-aos="fade-right" class="col-lg-6 mb-3 mb-lg-0">
                    <div
                        class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                        <h2 class="fw-bold">Gadgets</h2>
                        <a class="nav-link fs-5 fw-bold" style="color: #6610f2;" href="#">More in Gadgets<i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                    @foreach ($gadgetPostOne as $post)
                        <div class="mb-5">
                            <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                                <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}"
                                    alt="">
                                <h3 class="mt-3 fs-4 fw-bold text-black">{{ $post->title }}</h3>
                            </a>
                            <div class="d-flex gap-3 mb-2 align-items-center">
                                <span class="">
                                    <span><i class="bi bi-person-fill"></i></span>
                                    <span class="">winters</span>
                                </span>
                                <span class="">
                                    <span><i class="bi bi-calendar2-week"></i></span>
                                    <span>{{ date('d M Y', strtotime($post->created_at)) }} </span>
                                </span>
                                <span class="">
                                    <span><i class="bi bi-chat-dots"></i></span>
                                    <span>No Comments</span>
                                </span>
                            </div>
                            <p class="text-secondary fs-5 fw-normal">{!! Str::limit(strip_tags($post->description), 200) !!}</p>
                        </div>
                    @endforeach


                    <div class="row">
                        @foreach ($gadgetPostsTwo as $post)
                            <div class="col-lg-6 pe-lg-0">
                                <div>
                                    <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                                        <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}"
                                            alt="photo">
                                    </a>
                                    <div class="pe-3">
                                        <h3 class="mt-3 fs-4 fw-bold text-black">{{ $post->title }}</h3>
                                        <div class="d-flex gap-3 mb-2 align-items-center">
                                            <span class="">
                                                <span><i class="bi bi-calendar2-week"></i></span>
                                                <span>{{ date('d M Y', strtotime($post->created_at)) }} </span>
                                            </span>
                                        </div>
                                        <p class="text-secondary fs-5 fw-normal">{!! Str::limit(strip_tags($post->description), 60) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left" class="col-lg-6">
                    <div
                        class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                        <h2 class="fw-bold">Software</h2>
                        <a class="nav-link fs-5 fw-bold" style="color: #6610f2;" href="#">More in Software<i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="mb-5">
                        <img width="100%"
                            src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-08.jpg"
                            alt="">
                        <h3 class="mt-3 fs-4 fw-bold">Scientists Fear Climate Data Gap as Trump Aims at Satellites
                        </h3>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class="">
                                <span><i class="bi bi-person-fill"></i></span>
                                <span class="">winters</span>
                            </span>
                            <span class="">
                                <span><i class="bi bi-calendar2-week"></i></span>
                                <span>July 7, 2021 </span>
                            </span>
                            <span class="">
                                <span><i class="bi bi-chat-dots"></i></span>
                                <span>No Comments</span>
                            </span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                            consequat scelerisque nibh amet, massa egestas risus, gravida vel amet, imperdiet
                            volutpat
                            rutrum sociis quis velit, commodo enim aliquet. …</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 pe-lg-0">
                            <div>
                                <img width="100%"
                                    src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-14.jpg"
                                    alt="">
                                <div class="pe-3">
                                    <h3 class="mt-3 fs-4 fw-bold">Life on CAD: Get to Know the Shortcut</h3>
                                    <div class="d-flex gap-3 mb-2 align-items-center">
                                        <span class="">
                                            <span><i class="bi bi-calendar2-week"></i></span>
                                            <span>July 7, 2021 </span>
                                        </span>
                                    </div>
                                    <p class="text-secondary fs-5 fw-normal">Cursus iaculis etiam in In nullam donec
                                        sem sed consequat …</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-0">
                            <div>
                                <img width="100%"
                                    src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-19.jpg"
                                    alt="">
                                <div class="pe-3">
                                    <h3 class="mt-3 fs-4 fw-bold">Why You Shouldn’t Walk on Escalators</h3>
                                    <div class="d-flex gap-3 mb-2 align-items-center">
                                        <span class="">
                                            <span><i class="bi bi-calendar2-week"></i></span>
                                            <span>July 7, 2021 </span>
                                        </span>
                                    </div>
                                    <p class="text-secondary fs-5 fw-normal">Cursus iaculis etiam in In nullam donec
                                        sem sed consequat …</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Gadgets section end --}}

    {{-- Offer section start --}}
    <section data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-lg-10">
                    <img width="100%"
                        src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-wide-promo-banner-placeholder.jpg"
                        alt="">
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>
    {{-- Offer section end --}}

    {{-- Game section start --}}
    <section data-aos="zoom-in" class="py-5">
        <div class="container border-1 border-bottom">
            <div class="row">
                <div
                    class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                    <h3 class="fw-bold">Game</h3>
                    <a class="nav-link fs-6 fw-bold" style="color: #6610f2;"
                        href="{{ route('filter_by_category', $gamesPosts[0]->category_id) }}">More in Games <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                @foreach ($gamesPosts as $post)
                    <div class="col-lg-6 p-lg-0 mb-lg-0 mb-3">
                        <div class="wrapper position-relative w-100">
                            <div class="bg-img">
                                <img class="" width="100%" height="100%"
                                    src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="photo">
                            </div>
                            <div class="content p-lg-4 position-absolute bottom-0 z-3">
                                <a href="{{ route('single_post_view', $post->id) }}"
                                    class="text-white text-decoration-none h3">{{ $post->title }}</a>
                                <p class="lead text-light fs-6 fw-normal">{!! Str::limit(strip_tags($post->description), 200) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Game section end --}}

    {{-- Apps section start --}}
    <section data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="py-5">
        <div class="container">
            <div
                class="d-flex p-lg-0 justify-content-between flex-column flex-lg-row align-items-start align-items-lg-center mb-3">
                <h1 class="fw-bold">Apps</h1>
                <a class="nav-link fs-5 fw-bold" style="color: #6610f2;"
                    href="{{ route('filter_by_category', $appsPosts[0]->category_id) }}">More in Apps <i
                        class="bi bi-arrow-right"></i></a>
            </div>
            <div class="row">
                @foreach ($appsPosts as $post)
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                            <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="photo">
                            <h3 class="mt-3 fs-4 fw-bold text-black">{{ $post->title }}</h3>
                        </a>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class="">
                                <span><i class="bi bi-person-fill"></i></span>
                                <span class="">winters</span>
                            </span>
                            <span class="">
                                <span><i class="bi bi-calendar2-week"></i></span>
                                <span>{{ date('d M Y', strtotime($post->created_at)) }}</span>
                            </span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal">{!! Str::limit(strip_tags($post->description), 200) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- App section end --}}

    {{-- Newsletters section start --}}
    <section data-aos="zoom-in" class="py-5 my-5"
        style="background-image: linear-gradient(to right,rgba(142,251,218,0.64),rgba(142,251,218,0.64)),url(https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-cta-gradient-bg-green.svg); background-repeat: no-repeat background-position: left top; background-size: contain; background-attachment: scroll; min-height: 60px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Sign up for Newsletter</h1>
                    <p class="lead fs-6">Maecenas potenti ultrices, turpis eget turpis gravida.</p>
                </div>
                <div class="col-lg-6">
                    <div class="d-lg-flex gap-4 align-items-center justify-content-center">
                        <input class="form-control mb-lg-0 mb-3 py-3" type="email" placeholder="Enter your email..">
                        <button
                            class="btn btn-primary border-0 fw-semibold rounded-5 px-4 bg_color_indigo fs-5">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Newsletters section end --}}
@endsection
