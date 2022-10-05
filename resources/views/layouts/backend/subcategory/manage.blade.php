@extends('layouts.backend.master')

@section('title')
    Manage Subcategories
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable of all Subcategories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->category->name }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{ route('subcategories.edit', $row->id) }}" class="btn-sm bg-info mx-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ route('subcategories.show', $row->id) }}" class="btn-sm col-md-3 mx-2 bg-{{ $row->status == 1 ? 'primary' : 'secondary' }}">
                                                        <i class="fa fa-{{ $row->status == 1 ? 'eye' : 'eye-slash' }}"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="" onclick="deleteRow({{ $row->id }})" class="btn-sm bg-danger col-md-3 mx-2">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="{{ route('subcategories.destroy', $row->id) }}" method="POST" id="delete{{ $row->id }}">
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
