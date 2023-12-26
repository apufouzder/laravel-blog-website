@extends('layouts.master')

@section('content')
    @php
        $page = 'About';
    @endphp


    <section data-aos="fade-up" style="padding: 7rem 0" class="bg-light position-relative">
        <div style="top: 2rem;" class="simple-shape four"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="h1 display-3 fw-semibold">About Us</h1>
                    <p class="text-secondary my-4 fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ipsa
                        accusantium molestias consequuntur deserunt odio, esse vel vitae!</p>
                    <div class="d-flex flex-column">
                        <strong class="fs-5">John Smith</strong>
                        <span>Founder, CEO</span>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                    <img width="100%" src="{{ 'images/asset_img/about.jpg' }}" alt="About">
                </div>
            </div>

            {{-- Podcast section start --}}
            <section data-aos="zoom-in-up" class="my-5 pt-5">
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
            </section>
            {{-- Podcast section end --}}

            <div data-aos="fade-up" class="row pt-5 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h2 class="h2 fw-bolder">What CEO Says</h2>
                    <p class="text-secondary my-3 fs-5">Facilisi sed ultrices fringilla nec nisl est faucibus augue enim,
                        lobortis cras leo consectetur pellentesque at cras ut quis mattis elit ut nam placerat.</p>
                    <ul class="list-unstyled lh-lg">
                        <li>
                            <i class="bi bi-check-circle text-success"></i>
                            Pellentesque nulla at pharetra
                        </li>
                        <li>
                            <i class="bi bi-check-circle text-success"></i>
                            Magna morbi aenean vel convallis
                        </li>
                        <li>
                            <i class="bi bi-check-circle text-success"></i>
                            Tempus vitae bibendum venenatis pulvinar
                        </li>
                        <li>
                            <i class="bi bi-check-circle text-success"></i>
                            Lectus erat pharetra ultrices aliquet
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-5 col-md-5">
                    <div class="w-75">
                        <img width="100%" src="{{ 'images/asset_img/ceo.png' }}" alt="About">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
