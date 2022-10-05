@extends('layouts.backend.master')

@section('title')
    profile
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card">
                        <div class="card-body" style="font-size: 16px">
                            <div class="row">
                                <div class="col-md-6">Name: <span>{{ $self->user->name }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Age: {{ $years }} years {{ $days }} days</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Email: <span>{{ $self->user->email }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Phone: <span>{{ $self->mobile }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


