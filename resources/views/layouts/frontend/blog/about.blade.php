@extends('layouts.frontend.master')

@section('title')
    about
@endsection

@section('body')

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h2>Our honorable team members</h2>
                        <p>Team works that bind us together to get a good result.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach($authority as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-block mb-5 mb-lg-0">
                            <img src="{{ asset($row->profile->image) }}" alt="" class="img-about img-fluid rounded">
                            <div class="team-content mt-4">
                                <h3 class="title-large">{{ $row->name }}</h3>
                                <p>{{ $row->role }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
