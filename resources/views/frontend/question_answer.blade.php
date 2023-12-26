@extends('layouts.master')

@section('content')
    @php
        $page = 'Answer';
    @endphp

    <section data-aos="fade-up" class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 bg-white px-lg-4">

                    <div class="d-flex justify-content-between py-4">
                        <h3>Answers</h3>
                    </div>


                    <div class="card mt-4 mx-lg-3 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3>@php echo $question->question @endphp</h3>
                                <a href="/questions">Back</a>
                            </div>

                            <ul class="card-meta list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#" class="card-meta-author">
                                        {{-- <img src="images/john-doe.jpg"> --}}
                                        <span>{{ $question->user_name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ date('d M Y', strtotime($question->created_at)) }}
                                </li>
                                <li class="list-inline-item text-primary">
                                    <i class="bi bi-tags"></i>
                                    {{ $question->category_name }}
                                </li>
                            </ul>
                        </div>

                        {{-- Answer here --}}
                        @foreach ($answers as $answer)
                            <div class="card-body pt-1 ms-lg-4">
                                <div class="media d-block d-flex align-items-baseline gap-2">
                                    <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                                        <img width="40" height="40" class="mr-3"
                                            src="https://img.icons8.com/color/48/user-male-circle--v2.png" alt="User" />
                                    </a>
                                    <div class="media-body w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>
                                                <a href="#" class="h6 d-inline-block mb-3">{{ $answer->user_name }}
                                                </a>
                                                <small class="text-black-800 ml-2 font-weight-600">
                                                    {{ date('d M Y', strtotime($answer->created_at)) }}
                                                </small>
                                            </span>
                                            @if ($answer->user_id === Auth()->user()->id)
                                                <form action="{{ route('question_answer_delete', $answer->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit"
                                                        class="delete text-danger border-0 fs-5 bg-white">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>

                                        <p class="ms-3">@php echo $answer->answer; @endphp</p>
                                        <hr class="my-3">
                                        <div class="d-flex gap-1">

                                            @php
                                                $like = DB::table('question_answer_likes')
                                                    ->where('answer_id', $answer->id)
                                                    ->get();

                                                $liker_user = DB::table('question_answer_likes')
                                                    ->where('answer_id', $answer->id)
                                                    ->where('user_id', Auth()->user()->id)
                                                    ->first();
                                            @endphp

                                            @if ($liker_user)
                                                <a style="margin-top: 2px;" class="text-decoration-none fs-5"
                                                    href="{{ route('question_answer_unlike', $answer->id) }}">
                                                    <i class="bi bi-heart-fill text-danger"></i>
                                                </a>
                                            @else
                                                <a style="margin-top: 2px;" class="text-decoration-none fs-5"
                                                    href="{{ route('question_answer_like', $answer->id) }}">
                                                    <i class="bi bi-heart text-dark"></i>
                                                </a>
                                            @endif
                                            <span class="ml-1 fs-5">({{ $like->count() }})</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="mt-4 px-5">
                        {{ $answers->links('pagination::bootstrap-5') }}
                    </div>


                    <!-- Answer section here -->
                    <div class="col p-lg-3 shadow-md mb-5 mt-4 bg-white">
                        <h3 class="mb-4">Leave a Answer</h3>
                        <form action="{{ route('question_answer_store', $question->id) }}" method="POST">
                            @csrf

                            <textarea style="background: #f5f5f5" class="tinymce-editor form-control " name="answer" rows="4"
                                placeholder="Type here..."></textarea>
                            <button type="submit" class="btn btn-primary mt-3 fw-semibold">Answer Submit</button>
                        </form>
                    </div>

                </div>
                {{-- <div class="col-lg-4">

                    @include('includes.rightSideBar')

                </div> --}}
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
@endsection
