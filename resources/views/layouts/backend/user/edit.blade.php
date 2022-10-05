@extends('layouts.backend.master')

@section('title')
    Edit User
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card border-info">
                        <div class="card-header border-info">
                            <h4 class="text-center">User data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manageUsers.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="a" class="form-label ml-1">Name</label>
                                        <input type="text" value="{{ $user->name }}" disabled id="a" class="border-primary form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="a" class="form-label ml-1">Email</label>
                                        <input type="text" value="{{ $user->email }}" disabled id="a" class="border-primary form-control">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="form-label ml-1">Role</label>
                                        <select name="user_role" class="border-primary form-control">
                                            <option selected disabled><-------------Select One-------------></option>
                                            @foreach($roles as $row)
                                                <option value="{{$row->slug}}" {{ $user->role == $row->slug ?'selected':'' }}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mx-auto">
                                        <input type="submit" value="Update Role" name="button"  class="btn w-100 btn-success">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
