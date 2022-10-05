@extends('layouts.backend.master')

@section('title')
    Edit Subcategory
@endsection

@section('body')
    <section class="mt-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <div class="card mt-5 bg-gradient-light">
                        <div class="card-header">
                            <h2 class="text-center text-bold">Edit Subcategory</h2>
                        </div>
                        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group mt-4">
                                    <label for="asd">Select Category</label>
                                    <select name="category_id" @error('category_id') is-invalid @enderror id="asd">
                                        <option value="" selected disabled><---------Select Category--------></option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" {{ $subcategory->category_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="arif">Subcategory name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $subcategory->name }}" required id="arif" placeholder="Enter Subcategory">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" value="Update Subcategory" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



