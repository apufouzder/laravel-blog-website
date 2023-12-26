@extends('layouts.master')

@section('content')
    @php
        $page = 'single-post';
    @endphp

    <section data-aos="zoom-in" style="background: #f5f5f5;" class="py-5">
        <div class="container">
            <div class="row px-3 px-lg-0">
                <div class="col-lg-2"></div>
                <div class="col p-lg-5 shadow-md p-md-4 p-3 mb-5 bg-white">
                    <div class="overflow-hidden p-lg-4  p-2">
                        <img width="100%" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}" alt="Photo">
                        <h1 class="my-3 display-6 fw-semibold">{{ $post->title }}</h1>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class=""><strong class="text-primary">{{ $post->category_name }}</strong> / By
                                Winters</span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal"><?php echo $post->description; ?></p>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <!-- Comments here -->
            <div class="row px-3 px-lg-0">
                <div class="col-lg-2"></div>
                <div class="col p-lg-5 shadow-md p-md-4 p-3 mb-5 bg-white">
                    <h2>All Comments</h2>
                    @if (count($comments) > 0)
                        @foreach ($comments as $comment)
                            <div class="border mt-4 p-3 rounded-4">
                                <h6 class="text-primary"><i>{{ $comment->user_name }}</i></h6>
                                <p class="ms-3">
                                    @php
                                        echo $comment->comment;
                                    @endphp
                                </p>
                                <div class="d-flex gap-3 mt-3 ms-3">
                                    <span>Like (2)</span>
                                    <span>Replay</span>
                                    <span>{{ date('d M Y', strtotime($comment->created_at)) }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning text-center py-3 mt-3 fs-6" role="alert">
                            <i class="bi bi-exclamation-circle"></i> No comment available for this post!
                        </div>
                    @endif

                    <div class="mt-5">
                        {{ $comments->links('pagination::bootstrap-4') }}
                    </div>

                </div>
                <div class="col-lg-2"></div>
            </div>

            <!-- Comment section here -->
            <div class="row px-3 px-lg-0">
                <div class="col-lg-2"></div>
                <div class="col p-lg-5 shadow-md p-md-4 p-3 mb-5 bg-white">
                    <h2>Leave a Comment</h2>
                    <p class="text-secondary">Your email address will not be publish.</p>
                    <form action="{{ route('comment_store', $post->id) }}" method="POST">
                        @csrf

                        <textarea style="background: #f5f5f5" class="rounded form-control fs-5 d-block w-100 border-0 p-3 mb-4" cols="30"
                            name="comment" rows="7" placeholder="Type here..."></textarea>
                        <button type="submit" class="btn btn-primary fw-semibold">Comment</button>
                    </form>

                </div>
                <div class="col-lg-2"></div>
            </div>

        </div>
        </div>
        </main>
    @endsection
