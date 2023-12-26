@extends('layouts.dashboard-master')

@section('dashboard')
    @php
        $page = 'Blog';
    @endphp

    <section class="container-fluid px-4">

        <div class="row my-5">
            <div class="d-flex justify-content-between ">
                <h3 class="fs-4 mb-3">Blog list</h3>
                <button type="button" class="mb-3 btn btn-primary bg_color_indigo fs-5" data-bs-toggle="modal"
                    data-bs-target="#blogModal">Create Blog</button>

                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> --}}

                {{-- Add Category Model --}}
                @include('includes/model-form')


            </div>
            <div class="col px-4 table-responsive">
                <table class="table bg-white rounded p-4 shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="60">No</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->title }}</td>
                                <td><span style="font-weight: 500">{{ $post->category_name }}</span></td>
                                <td>{{ nl2br(e(Str::limit(strip_tags($post->description), 200))) }}</td>
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
                                <td class="d-flex gap-1">
                                    <button class="btn me-2 btn-primary" data-bs-toggle="modal"
                                        data-bs-target="{{ '#editPostModal' . $post->id }}"><i
                                            class="fas fa-edit"></i></button>
                                    <form action="{{ route('create-blog.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Edit Category Model --}}
                            <div class="modal  fade" id="{{ 'editPostModal' . $post->id }}" tabindex="-1"
                                aria-labelledby="editPostModalLabel" aria-hidden="true">
                                <div class="modal-lg modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editPostModalLabel">Edit Blog</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('create-blog.update', $post->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')

                                                <div class="">
                                                    <div class="col mb-3">
                                                        <label for="postName" class="col-form-label">Post Title:</label>
                                                        <input type="text"
                                                            class="@error('title') is-invalid @enderror form-control"
                                                            name="title" value="{{ $post->title }}">

                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                    <div class="col">
                                                        <label for="category" class="col-form-label">Category:</label>
                                                        <select name="category_id" class="form-select"
                                                            aria-label="category">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if ($category->id == $post->category_id) selected @endif>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row align-items-center gap-4">
                                                        <div class="col">
                                                            <label for="thumbnail" class="col-form-label">Post
                                                                Thumbnail:</label>
                                                            <input type="file" class="form-control" name="thumbnail">
                                                            <input type="hidden" class="form-control" name="old_thumbnail"
                                                                value="{{ $post->thumbnail }}">
                                                        </div>
                                                        <div class="col mt-4">
                                                            <input type="checkbox" class="form-check-input" name="status"
                                                                value="1"
                                                                @if ($post->status == '1') checked @endif
                                                                id="status">
                                                            <label class="form-check-label" for="status">Post
                                                                Status</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="col-form-label">Description:</label>
                                                    <textarea class="tinymce-editor form-control @error('description') is-invalid @enderror" name="description" id="description">{{ strip_tags($post->description) }}</textarea>

                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
