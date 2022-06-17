@extends('admin.layouts.app')
@section('title','Product List')
@section('product','mm-active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('create-product') }}" class="btn btn-primary">Create New Product</a>
                {{-- create form --}}
                <div class="card mt-2">
                    @if (session()->has('success'))
                        <div class="alert alert-success m-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>

                                    <th>Qualtity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td><img src="{{ asset('image/' . $list->image) }}" width="100px" alt=""></td>
                                        <td>{{ $list->price }}</td>
                                        <td>{{ $list->quantity }}</td>
                                        <td>
                                            <a href="{{ route('edit', $list->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('delete', $list->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
