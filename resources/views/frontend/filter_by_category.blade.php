@extends('layouts.master')

@section('content')
    @php
        $page = 'filter-category';
    @endphp

    <section data-aos="fade-up" class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 border-end">

                    @if (count($posts) > 0)
                        <h1 class="py-5">{{ $posts[0]->category_name }}</h1>
                        @foreach ($posts as $post)
                            <div data-aos="fade-up" class="col px-lg-5 px-md-4 px-2 mb-5">
                                <div class="border-top overflow-hidden pt-5">

                                    <a class="text-decoration-none" href="{{ route('single_post_view', $post->id) }}">
                                        <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}"
                                            alt="photo">
                                        <h3 class="mt-3 fs-4 fw-bold text-black">{{ $post->title }}</h3>
                                    </a>

                                    <div class="d-flex gap-3 mb-2 align-items-center">
                                        <span class=""><strong
                                                class="text_color_indigo">{{ $post->category_name }}</strong> / By
                                            Winters</span>
                                    </div>
                                    {{-- <p class="text-secondary fs-5 fw-normal">{{ nl2br(e(Str::limit(strip_tags($post->description), 200))) }}</p> --}}
                                    <p class="text-secondary fs-5 fw-normal">
                                        <?php
                                        $desc = nl2br(e(Str::limit(strip_tags($post->description), 200)));
                                        echo $desc;
                                        ?>
                                    </p>
                                    <a class="btn btn-link fs-5 text_color_indigo"
                                        href="{{ route('single_post_view', $post->id) }}">Read more...</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning text-center py-4 fs-5" role="alert">
                            <i class="bi bi-exclamation-circle"></i> No posts available for this category.
                        </div>
                    @endif

                </div>
                <div class="col-lg-4">

                    @include('includes.rightSideBar')

                </div>
            </div>
        </div>
    </section>


@endsection
