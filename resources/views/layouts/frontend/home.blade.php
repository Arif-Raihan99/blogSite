@extends('layouts.frontend.master')

@section('title')
    home
@endsection


@section('body')

        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                        <div class="all-news-block">
                            <h3 class="news-title">
                                <span>Latest News</span>
                            </h3>
                            <div class="all-news">
                                <div class="row">
                                    @foreach($newses as $key => $row)
                                    @if($key <= 5)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="post-block-wrapper post-float-half clearfix">
                                            <a href="{{ route('single.post', $row->id) }}">
                                                <div class="post-thumbnail mb-0">
                                                    <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                </div>
                                                <div class="post-content">
                                                    <a class="post-category my-0" href="{{ route('single.category', $row->category_id) }}">{{ $row->category->name }}</a>
                                                    <h3 class="post-title mb-0 mt-3"><a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a></h3>
                                                    <div class="post-meta mt-0 mx-0">
                                                        <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                        <div class="sidebar sidebar-right mt-md-0">
                            <div class="widget mt-md-0">
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
                                <div class="">
                                    <div class="widget mb-0 ml-0">
                                        <img class="banner img-fluid" src="{{ asset('/') }}frontend/images/add223.jpg" alt="300x300 ads"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block-wrapper" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="news-style-two">
                                    <h3 class="news-title">
                                        <a href="{{ route('single.category', $categories[0]->id) }}"><span>{{ $categories[0]->name }}</span></a>
                                    </h3>
                                    @php($cat=1)
                                    <div class="row">
                                        @foreach($newses as $key => $row)
                                        @if($row->category->name == $categories[0]->name && $cat <= 4)
                                            <div class="col-12">
                                                @if($cat == 1)
                                                    <div class="post-block-wrapper clearfix mb-4">
                                                        <div class="post-thumbnail">
                                                            <a href="{{ route('single.post', $row->id) }}">
                                                                <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h2 class="post-title mt-3 mb-0">
                                                                <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                            </h2>
                                                            <div class="post-meta mb-2 mt-0">
                                                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{ $row->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($cat > 1 && $cat < 5)
                                                    <div class="post-block-wrapper post-float clearfix">
                                                        <div class="post-thumbnail">
                                                            <a href="{{ route('single.post', $row->id) }}">
                                                                <img class="img-fluid" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                            </a>
                                                        </div>

                                                        <div class="post-content">
                                                            <h2 class="post-title title-sm mb-0">
                                                                <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                            </h2>
                                                            <div class="post-meta mt-0">
                                                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{ $row->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @php($cat=1)
                                                    @break
                                                @endif
                                            </div>
                                            @php($cat+=1)
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="news-style-two">
                                    <h3 class="news-title">
                                        <a href="{{ route('single.category', $categories[1]->id) }}"><span>{{ $categories[1]->name }}</span></a>
                                    </h3>
                                    @php($cat=1)
                                    <div class="row">
                                        @foreach($newses as $key => $row)
                                        @if($row->category->name == $categories[1]->name && $cat <= 4)
                                            <div class="col-12">
                                                @if($cat == 1)
                                                    <div class="post-block-wrapper clearfix mb-4">
                                                        <div class="post-thumbnail">
                                                            <a href="{{ route('single.post', $row->id) }}">
                                                                <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h2 class="post-title mt-3 mb-0">
                                                                <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                            </h2>
                                                            <div class="post-meta mb-2 mt-0">
                                                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{ $row->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($cat > 1 && $cat < 5)
                                                    <div class="post-block-wrapper post-float clearfix">
                                                        <div class="post-thumbnail">
                                                            <a href="{{ route('single.post', $row->id) }}">
                                                                <img class="img-fluid" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                            </a>
                                                        </div>

                                                        <div class="post-content">
                                                            <h2 class="post-title title-sm mb-0">
                                                                <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                            </h2>
                                                            <div class="post-meta mt-0">
                                                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{ $row->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @php($cat=1)
                                                    @break
                                                @endif
                                            </div>
                                            @php($cat+=1)
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget mt-md-0">
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
            </div>
        </section>

        <section class="news-style-four bg-light section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="block">
                            <h3 class="news-title">
                                <a href="{{ route('single.category', $categories[2]->id) }}"><span>{{ $categories[2]->name }}</span></a>
                            </h3>
                            @php($cat=1)
                            @foreach($newses as $key => $row)
                                @if($row->category->name == $categories[2]->name && $cat <= 4)
                                    @if($cat == 1)
                                        <div class="post-overlay-wrapper clearfix">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('single.post', $row->id) }}">
                                                    <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                </a>
                                            </div>

                                            <div class="post-content">
                                                <h2 class="post-title ">
                                                    <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                </h2>
                                                <div class="post-meta white">
                                                    <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    <span class="pull-right">
                                                        <i class="fa fa-comments"></i>
                                                        <span>{{ $row->total_comment }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($cat > 1 && $cat < 5)
                                        <div class="post-list-block">
                                            <div class="post-block-wrapper post-float clearfix">
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('single.post', $row->id) }}">
                                                        <img class="img-fluid" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title mb-0 title-sm">
                                                        <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                    </h2>
                                                    <div class="post-meta mt-0">
                                                        <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @php($cat=1)
                                        @break
                                    @endif
                                @php($cat+=1)
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="block">
                            <h3 class="news-title">
                                <a href="{{ route('single.category', $categories[3]->id) }}"><span>{{ $categories[3]->name }}</span></a>
                            </h3>
                            @php($cat=1)
                            @foreach($newses as $key => $row)
                                @if($row->category->name == $categories[3]->name && $cat <= 4)
                                    @if($cat == 1)
                                        <div class="post-overlay-wrapper clearfix">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('single.post', $row->id) }}">
                                                    <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                </a>
                                            </div>

                                            <div class="post-content">
                                                <h2 class="post-title ">
                                                    <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                </h2>
                                                <div class="post-meta white">
                                                    <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    <span class="pull-right">
                                                        <i class="fa fa-comments"></i>
                                                        <span>{{ $row->total_comment }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($cat > 1 && $cat < 5)
                                        <div class="post-list-block">
                                            <div class="post-block-wrapper post-float clearfix">
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('single.post', $row->id) }}">
                                                        <img class="img-fluid" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title mb-0 title-sm">
                                                        <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                    </h2>
                                                    <div class="post-meta mt-0">
                                                        <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @php($cat=1)
                                        @break
                                    @endif
                                @php($cat+=1)
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="block">
                            <h3 class="news-title">
                                <a href="{{ route('single.category', $categories[4]->id) }}"><span>{{ $categories[4]->name }}</span></a>
                            </h3>
                            @php($cat=1)
                            @foreach($newses as $key => $row)
                                @if($row->category->name == $categories[4]->name && $cat <= 4)
                                    @if($cat == 1)
                                        <div class="post-overlay-wrapper clearfix">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('single.post', $row->id) }}">
                                                    <img class="img-fluid img-cat-top" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                </a>
                                            </div>

                                            <div class="post-content">
                                                <h2 class="post-title ">
                                                    <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                </h2>
                                                <div class="post-meta white">
                                                    <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    <span class="pull-right">
                                                        <i class="fa fa-comments"></i>
                                                        <span>{{ $row->total_comment }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($cat > 1 && $cat < 5)

                                        <div class="post-list-block">
                                            <div class="post-block-wrapper post-float clearfix">
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('single.post', $row->id) }}">
                                                        <img class="img-fluid" src="{{ asset($row->image) }}" alt="post-thumbnail"/>
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h2 class="post-title mb-0 title-sm">
                                                        <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                                    </h2>
                                                    <div class="post-meta mt-0">
                                                        <span class="posted-time">{{ $row->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @else
                                        @php($cat=1)
                                        @break
                                    @endif
                                @php($cat+=1)
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
