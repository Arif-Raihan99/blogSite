@extends('layouts.backend.master')

@section('title')
    Edit Role
@endsection

@section('body')
    <section class="mt-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <div class="card mt-5 bg-gradient-light">
                        <div class="card-header">
                            <h2 class="text-center text-bold">Edit Role</h2>
                        </div>
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">Role name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" required id="role" placeholder="Enter role">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" value="Update Role" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

