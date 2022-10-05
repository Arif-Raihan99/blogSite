@extends('layouts.backend.master')

@section('title')
    Manage Profiles
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable of all Profiles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>WhatsApp</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($profiles as $row)
                                    @if(isset($role))
                                        @if($row->user->role=='user')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->user->email }}</td>
                                                <td>{{ $row->whatsapp }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->status == 1 ? 'Active' : 'Blocked' }}</td>
                                                <td>
                                                    <img src="{{ $row->image }}" alt="img" class="" style="height: 62px; width: 60px">
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <a href="{{ route('profiles.show', $row->id) }}" class="btn-sm col-md-3 mx-2 bg-{{ $row->status == 1 ? 'primary' : 'secondary' }}">
                                                                <i class="fa fa-{{ $row->status == 1 ? 'eye' : 'eye-slash' }}"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="" onclick="deleteRow({{ $row->id }})" class="btn-sm bg-danger col-md-3 mx-2">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                        <form action="{{ route('profiles.destroy', $row->id) }}" method="POST" id="delete{{ $row->id }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->user->email }}</td>
                                            <td>{{ $row->whatsapp }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td>{{ $row->status == 1 ? 'Active' : 'Blocked' }}</td>
                                            <td>
                                                <img src="{{ $row->image }}" alt="img" class="" style="height: 62px; width: 60px">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a href="{{ route('profiles.show', $row->id) }}" class="btn-sm col-md-3 mx-2 bg-{{ $row->status == 1 ? 'primary' : 'secondary' }}">
                                                            <i class="fa fa-{{ $row->status == 1 ? 'eye' : 'eye-slash' }}"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="" onclick="deleteRow({{ $row->id }})" class="btn-sm bg-danger col-md-3 mx-2">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <form action="{{ route('profiles.destroy', $row->id) }}" method="POST" id="delete{{ $row->id }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
