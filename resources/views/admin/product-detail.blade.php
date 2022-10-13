@extends('admin.layouts.app')
@section('title', 'Product Details')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('product') }}" class="btn btn-primary"> <i class="fa fa-backward"></i> Back</a>
                {{-- create form --}}
                <div class="card mt-2">
                    <div class="card-header">
                        <p class="card-title">Product Detail</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <img src="{{ asset('image/' . $productDetail->image) }}" style="width: 100px" alt="">
                        </div>
                        <div class="form-group">
                            <label for=""> Name : <h5 class="text-success d-inline">
                                    {{ $productDetail->name }} </h5>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for=""> Price : <h5 class="text-success d-inline ">
                                    {{ $productDetail->price }} </h5>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
