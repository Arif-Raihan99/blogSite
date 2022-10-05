@extends('layouts.frontend.master')

@section('title')
    {{ $category->name }}
@endsection

@section('body')

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="block category-listing category-style2">
                        <h3 class="news-title"><span>{{ $category->name }}</span></h3>
                        @foreach($categoryNewses as $row)
                            <div class="post-block-wrapper post-list-view clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <div class="post-thumbnail thumb-float-style">
                                            <a href="{{ route('single.post', $row->id) }}">
                                                <img class="img-fluid" src="{{ asset($row->image) }}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-6">
                                        <div class="post-content">
                                            <h2 class="post-title title-large ">
                                                <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                            </h2>
                                            {{ $row->image_title }}
                                            <div class="post-meta">
                                                <span>
                                                    <i class="fa fa-clock-o"></i>
                                                    <span>{{ $row->created_at->diffForHumans() }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right row">
                        <div class="widget mb-0 mt-md-0 col-md-12 align-content-center">
                            <h3 class="news-title">
                                <span>Categories</span>
                            </h3>
                            <div class="post-list-block">
                                <div class="review-post-list">
                                    @foreach($categories as $category)
                                        <div class="top-author">
                                            <div class="info">
                                                <h4 class="name"><a href="{{ route('single.category', $category->id) }}">{{ $category->name }}</a></h4>
                                                <span class="fs-14">{{ count($newses->where('category_id', $category->id)) }} Posts</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="widget mt-md-0 col-md-12">
                            <h3 class="news-title">
                                <span>Popular News</span>
                            </h3>

                            <div class="post-list-block">
                                @foreach($popularNews as $news)
                                    <div class="post-block-wrapper post-float ">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('single.post', $news->id) }}">
                                                <img class="img-fluid" src="{{ asset($news->image) }}" alt="post-thumbnail"/>
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h2 class="post-title mb-0 title-sm">
                                                <a href="{{ route('single.post', $news->id) }}">{{ $news->title }}</a>
                                            </h2>
                                            <div class="post-meta my-0">
                                                <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{ $news->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="post-meta mt-0">
                                                <span class="posted-time"><i class="fa fa-eye mr-1"></i>{{ $news->hit_count }} {{ $news->hit_count < 2 ? 'view' : 'views' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-items-center col-md-7">{{ $categoryNewses->links() }}</div>
        </div>
    </section>

@endsection
