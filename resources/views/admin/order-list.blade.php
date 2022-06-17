@extends('admin.layouts.app')
@section('title','Order List')
@section('order','mm-active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- create form --}}

                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Order List</h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Address</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->phone }} </td>
                                        <td>{{ $list->address }}</td>
                                        <td>{{ $list->product_name }}</td>
                                         <td>{{ $list->quantity }}</td>
                                        <td>{{ $list->price }}</td>
                                        <td>{{ $list->status }}</td>
                                        <td>
                                            <a href="{{ route('deliver',$list->id) }}" class="btn btn-success">Deliver</a>
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
