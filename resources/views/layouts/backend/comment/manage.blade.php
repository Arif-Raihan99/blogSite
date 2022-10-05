@extends('layouts.backend.master')

@section('title')
    Manage Comments
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable of all Comments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Blog</th>
                                    <th>Content</th>
                                    <th>Like</th>
                                    <th>Dislike</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->blog_id }}</td>
                                        <td>{{ $row->content }}</td>
                                        <td>{{ $row->like }}</td>
                                        <td>{{ $row->dislike }}</td>
                                        <td>{{ $row->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="" class="btn-sm bg-info mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ route('comments.show', $row->id) }}" class="btn-sm col-md-3 mx-2 bg-{{ $row->status == 1 ? 'primary' : 'secondary' }}">
                                                        <i class="fa fa-{{ $row->status == 1 ? 'eye' : 'eye-slash' }}"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="" onclick="deleteRow({{ $row->id }})" class="btn-sm bg-danger col-md-3 mx-2">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('comments.destroy', $row->id) }}" method="POST" id="delete{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </div>
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
    </section>
@endsection
