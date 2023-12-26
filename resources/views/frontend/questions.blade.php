@extends('layouts.master')

@section('content')
    @php
        $page = 'Questions';
    @endphp

    <section data-aos="fade-up" class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 border-end px-lg-4 px-2">

                    <div class="d-flex justify-content-between py-5">
                        <h4>Frequently asked questions</h4>
                        <button class="btn btn-primary">ASK A QUESTION</button>
                    </div>

                    @foreach ($questions as $question)
                        <div class="card mt-4 mx-lg-3 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4>@php echo $question->question; @endphp</h4>
                                    @if ($question->user_id === Auth()->user()->id)
                                        <form action="{{ route('question_delete', $question->id) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="delete text-danger fs-5 border-0 bg-white">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    @endif
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
                                        <i class="bi bi-tags"></i> {{ $question->category_name }}
                                    </li>
                                    <li class="list-inline-item text-primary">
                                        <i class="bi bi-chat-dots"></i>
                                        @php
                                            $answer = DB::table('question_answers')
                                                ->where('question_id', $question->id)
                                                ->get();
                                            echo count($answer);

                                            echo count($answer) > 1 ? ' Answers' : ' Answer';
                                        @endphp
                                    </li>
                                </ul>

                                <a href="{{ route('question_answer', $question->id) }}"
                                    class="btn btn-outline-primary btn-sm mt-1 py-1">See answers</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4 px-5">
                        {{ $questions->links('pagination::bootstrap-5') }}
                    </div>


                    <!-- Question section here -->
                    <div class="col p-lg-5 shadow-md p-md-4 p-3 mb-5 mt-4 mx-lg-3 bg-white">
                        <h3 class="mb-4">Leave a Answer</h3>
                        <form action="{{ route('questions_store') }}" method="POST">
                            @csrf

                            <select name="category_id" class="form-select mb-4" aria-label="category">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <textarea style="background: #f5f5f5" class="tinymce-editor rounded form-control" name="question" rows="5"
                                placeholder="Type here..."></textarea>
                            <button type="submit" class="btn btn-primary mt-3 fw-semibold">Reply Now</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-4">

                    @include('includes.rightSideBar')

                </div>
            </div>
        </div>
    </section>
@endsection
