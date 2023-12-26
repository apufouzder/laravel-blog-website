@extends('layouts.master')

@section('content')
    @php
        $page = 'Contact';
    @endphp

    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Contact Form</h3>
                <form action="{{ route('contact_store') }}" class="w-75 mx-auto p-3" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="">
                        <div class="col">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col">
                            <label for="subject" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" name="subject">
                        </div>

                        <div class="col">
                            <label for="description" class="col-form-label">Message:</label>
                            <textarea class="tinymce-editor form-control" name="message" id="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
