@extends('layouts.dashboard-master')

@php
    $page = 'Dashboard';
@endphp

@section('dashboard')
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ Auth::user()->count() }}</h3>
                        <p class="fs-5">Total Users</p>
                    </div>
                    <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ $totalPosts }}</h3>
                        <p class="fs-5">Posts</p>
                    </div>
                    <i class="fas fa-file fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ $totalQuestion }}</h3>
                        <p class="fs-5">Questions</p>
                    </div>
                    <i class="fas fa-question-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ $totalCategory }}</h3>
                        <p class="fs-5">Categories</p>
                    </div>
                    <i class="fas fa-tag fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
        </div>

        {{-- Chart Info here [hidden] --}}
        <div class="d-flex flex-lg-row flex-column align-item-center gap-3 my-5">

            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

            <div hidden id="cats">
                @foreach ($categoryPostCounts as $item)
                    <span id="{{ $item->category_name }}">{{ $item->category_name }}</span>

                    <small id="post{{ $item->post_count }}">{{ $item->post_count }}</small>
                @endforeach
            </div>


            <canvas id="categoryQuestionCounts" style="width:100%;max-width:600px"></canvas>

            <div hidden id="questionCount">
                @foreach ($categoryQuestionCounts as $question)
                    <span id="{{ $question->category_name }}">{{ $question->category_name }}</span>
                    <small id="question-{{ $question->question_count }}">{{ $question->question_count }}</small>
                @endforeach
            </div>
        </div>

        <div class="row my-5">
            <h3 class="fs-4 mb-3">Recent Posts</h3>
            <div class="col">
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentPosts as $key => $post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->title }}</td>
                                <td><span style="font-weight: 500">{{ $post->category_name }}</span></td>
                                <td>
                                    <img width="100px" height="65px" style="object-fit: contain" src="{{ asset('post_thumbnails/' . $post->thumbnail) }}"
                                        alt="thumbnail">
                                </td>
                                <td>
                                    @if ($post->status == '1')
                                        <span style="background: #c8fff5" class="btn">Publish</span>
                                    @else
                                        <span style="background: #ffc8c8" class="btn">Private</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
