@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12  text-center" >
            <h1 class="page-title"> Crud Operations </h1>
        </div>
        <div class="col-lg-12">

            <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" name="name" type="text" placeholder="Enter Name" aria-label="default input example">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-lg-12">
            <div>
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">IMAGE </th>
                        <th scope="col">AGE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->image }}</td>
                            <td>{{ $task->age }}</td>
                            <td>@if ($task->done == 0)
                                    <span class="btn btn-warning" >Not Completed</span>
                                @else
                                    <span class="btn btn-success" > Completed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success">Completed</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .page-title{
        padding-top: 5vh;
        font-size: 3rem;
        color: #009c0d;
    }
</style>
@endpush
