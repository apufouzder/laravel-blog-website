@extends('layouts.dashboard-master')

@section('dashboard')

@php
    $page = "Messages";
@endphp

<section class="container-fluid px-4">

    <div class="row my-5">
        <div class="d-flex justify-content-between ">
            <h3 class="fs-4 mb-3">Message list</h3>


        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $sl => $message)
                    <tr>
                        <th  class="fw-normal" scope="row">{{++$sl}}</th>
                        <th  class="fw-normal" scope="row">{{ $message->name}}</th>
                        <th  class="fw-normal" scope="row">{{ $message->email}}</th>
                        <th  class="fw-normal" scope="row">{{ $message->subject}}</th>
                        <th class="fw-normal" scope="row">@php echo $message->message; @endphp</th>
                        <td class="d-flex gap-1">
                            <a class="btn btn-success" href="mailto:{{$message->email}}" target="_blank"><i class="fas fa-envelope"></i></a>
                            <form action="{{route('message.destroy', $message->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
