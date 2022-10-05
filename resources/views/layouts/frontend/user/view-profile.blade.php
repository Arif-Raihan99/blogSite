@extends('layouts.frontend.master')

@section('title')
    view profile
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="clo-md-4 mx-auto">
                    <span>Name: <h3> {{ $user->user->name }}</h3></span>
                    <span>Email: <h4> {{ $user->user->email }}</h4></span>
                    <span>User role: <h4> {{ $user->user->role }}</h4></span>
                    <h5><span>Mobile: {{ $user->mobile }}</span></h5>
                    <h5><span>Father: {{ $user->father_name }}</h3></span></h5>
                    <h5><span>Mother: {{ $user->mother_name }}</span></h5>
                    <h5><span>Total Post: {{ $total_post }}</span></h5>
                    <h5><span>Total comment: {{ $total_cmnt }} </span></h5>
                </div>
            </div>
        </div>
    </section>

@endsection
