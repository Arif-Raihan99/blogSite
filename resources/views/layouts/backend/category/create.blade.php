@extends('layouts.backend.master')

@section('title')
    Create Category
@endsection

@section('body')
    <section class="mt-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <div class="card mt-5 bg-gradient-light">
                        <div class="card-header">
                            <h2 class="text-center text-bold">Input Category</h2>
                        </div>
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">Category name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}" id="role" placeholder="Enter Category">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" value="Create Category" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

