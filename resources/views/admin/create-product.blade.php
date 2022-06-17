@extends('admin.layouts.app')
@section('title','Create Product')
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
                    @if(session()->has('success'))
                        <div class="alert alert-success m-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-header"></div>
                    <div class="card-body">

                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control rounded" value="{{ old('name') }}" name="name" id="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control rounded" value="{{ old('price') }}" name="price" id="" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control rounded" value="{{ old('description') }}" name="description" id=""
                                    placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control rounded" value="{{ old('quantity') }}" name="quantity" id=""
                                    placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <input type="file" value="{{ old('image') }}" class="form-control" name="image">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

