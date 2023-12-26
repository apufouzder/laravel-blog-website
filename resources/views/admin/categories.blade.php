@extends('layouts.dashboard-master')

@section('dashboard')

@php
    $page = "Categories";
@endphp

<section class="container-fluid px-4">
    <div class="row my-5">
        <div class="d-flex justify-content-between ">
            <h3 class="fs-4 mb-3">Categories list</h3>
            <button type="button" class="mb-3 btn btn-primary bg_color_indigo fs-5" data-bs-toggle="modal" data-bs-target="#categoryModal">Create Category</button>
            {{-- Add Category Model --}}
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="categoryModalLabel">Add Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="categoryName" class="col-form-label">Name:</label>
                                            <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" value="{{ old('name') }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="col-form-label">Description:</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('name') }}</textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary addCategory">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $sl => $category)
                    <tr>
                        <th scope="row">{{++$sl}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td class="d-flex gap-1">
                            <button class="btn me-2 btn-primary" data-bs-toggle="modal" data-bs-target="{{ '#editCategoryModal' . $category->id }}"><i class="fas fa-edit"></i></button>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    {{-- Edit Category Model --}}
                    <div class="modal fade" id="{{ 'editCategoryModal' . $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editCategoryModalLabel">{{$category->name}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="categoryName" class="col-form-label">Name:</label>
                                                <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" value="{{ $category->name }}">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $category->description }}</textarea>

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
