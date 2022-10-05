@extends('layouts.backend.master')

@section('title')
    Create Blog
@endsection

@section('body')
    <section class="mt-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-9 mx-auto">
                    <div class="card mt-5 bg-gradient-light">
                        <div class="card-header">
                            <h2 class="text-center text-bold">Create New Blog</h2>
                        </div>
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row form-group">
                                    <label for="role" class="col-md-3">Title</label>
                                    <input type="text" name="title" class="col-md-9 form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}" id="role" placeholder="Enter Title">
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="row form-group">
                                    <label for="asd" class="col-md-3">Select Category</label>
                                    <select name="category_id" class="col-md-9 @error('category_id') is-invalid @enderror" id="asd">
                                        <option selected disabled><---------Select Category--------></option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="row form-group">
                                    <label for="as" class="col-md-3">Select Subcategory</label>
                                    <select name="subcategory_id" class="col-md-9 @error('subcategory_id') is-invalid @enderror" id="as">
                                        <option selected disabled><---------Select Subcategory--------></option>
                                        @foreach($subcategories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('subcategory_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="row form-group">
                                    <label for="tags" class="col-md-3">Tags</label>
                                    <input type="text" name="tags" class="col-md-9 form-control @error('tags') is-invalid @enderror" required value="{{ old('tags') }}" id="tags" placeholder="Enter Tags">
                                </div>
                                @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="row form-group">
                                    <label for="image" class="col-md-3">Image</label>
                                    <input type="file" name="image" class="col-md-9 form-control @error('image') is-invalid @enderror" required accept="image/*" id="image">
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image_title">Image Title</label>
                                    <input type="text" name="image_title" class="form-control @error('image_title') is-invalid @enderror" required value="{{ old('image_title') }}" id="image_title" placeholder="Enter Image Title">
                                </div>
                                @error('image_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="textEditor" cols="30" rows="10" required class="form-control @error('content') is-invalid @enderror">
                                        {{ old('content') }}
                                    </textarea>

                                </div>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create New Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



