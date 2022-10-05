@extends('layouts.backend.master')

@section('title')
    Manage Blogs
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable of all Blogs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Title</th>
                                    <th>Tags</th>
{{--                                    <th>Content</th>--}}
                                    <th>Hits</th>
{{--                                    <th>Image Title</th>--}}
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $row)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->category->name }}</td>
                                        <td>{{ $row->subcategory->name }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->tags }}</td>
{{--                                        <td>{!! $row->content  !!}</td>--}}
                                        <td>{{ $row->hit_count }}</td>
{{--                                        <td>{{ $row->image_title }}</td>--}}
                                        <td>{{ $row->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <img src="{{ $row->image }}" alt="img" class="" style="height: 62px; width: 60px">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{ route('blogs.edit', $row->id) }}" class="btn-sm bg-info mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ route('blogs.show', $row->id) }}" class="btn-sm col-md-3 mx-2 bg-{{ $row->status == 1 ? 'primary' : 'secondary' }}">
                                                        <i class="fa fa-{{ $row->status == 1 ? 'eye' : 'eye-slash' }}"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="" onclick="deleteRow({{ $row->id }})" class="btn-sm bg-danger col-md-3 mx-2">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('blogs.destroy', $row->id) }}" method="POST" id="delete{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{--                                <tfoot>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th>Rendering engine</th>--}}
                                {{--                                        <th>Browser</th>--}}
                                {{--                                        <th>Platform(s)</th>--}}
                                {{--                                        <th>Engine version</th>--}}
                                {{--                                        <th>CSS grade</th>--}}
                                {{--                                    </tr>--}}
                                {{--                                </tfoot>--}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
