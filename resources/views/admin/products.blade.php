@extends('layouts.dashboard-master')

@section('dashboard')



<section class="container-fluid px-4">
    
    <div class="row my-5">
        <div class="d-flex justify-content-between ">
            <h3 class="fs-4 mb-3">Recent Products</h3>
            <button type="button" class="mb-3 btn btn-primary bg_color_indigo fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Product</button>

            
            
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button> --}}
            
            {{-- Model --}}
                  @include('includes/model-form')




        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Television</td>
                        <td>Jonny</td>
                        <td>$1200</td>
                        <td><button>View</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Laptop</td>
                        <td>Kenny</td>
                        <td>$750</td>
                        <td><button>View</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Cell Phone</td>
                        <td>Jenny</td>
                        <td>$600</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection