@extends('admin.layouts.app')
@section('title','Edit Product')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
                {{-- create form --}}
                <div class="card mt-2">
                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-header"></div>
                    <div class="card-body">

                        <form action="{{ route('update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control rounded" value="{{ $product->name }}" name="name" id="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control rounded" value="{{ $product->price }}" name="price" id="" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control rounded" name="description" value="{{ $product->description }}"
                                    placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control rounded" name="quantity" value="{{ $product->quantity }}"
                                    placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset('image/' . $product->image) }}" width="100px" height="100px" alt="">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

