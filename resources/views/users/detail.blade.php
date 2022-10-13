@extends('admin.layouts.app')
@section('title', 'User Details')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('user.list') }}" class="btn btn-primary"> <i class="fa fa-backward"></i> Back</a>
                {{-- create form --}}
                <div class="card mt-2">
                    <div class="card-header">
                        <p class="card-title">User Details</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""> Name : <h5 class="text-success d-inline">
                                    {{ $user->name }} </h5>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for=""> Email : <h5 class="text-success d-inline ">
                                    {{ $user->email }} </h5>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for=""> Phone : <h5 class="text-success d-inline ">
                                    {{ $user->phone }} </h5>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
