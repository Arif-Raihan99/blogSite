@extends('layouts.frontend.master')

@section('title')
    {{ $singleNews->title }}
@endsection

@section('body')
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    <div class="single-post">
                        <div class="post-header mb-2">
                            <a class="post-category" href="{{ route('single.category', $singleNews->category_id) }}">{{ $singleNews->category->name }}</a>
                            <h2 class="post-title">{{ $singleNews->title }}</h2>
                        </div>
                        <div class="post-body">
                            <div class="post-featured-image">
                                <img src="{{ asset($singleNews->image) }}" class="img-fluid" alt="featured-image">
                                <p>{{ $singleNews->image_title }}</p>
                            </div>
                            <div class="entry-content">
                                <p class="justify fs-14">{!! $singleNews->content !!}</p>
                            </div>

{{--                            <div class="share-block my-0 d-flex justify-content-between align-items-center border-top border-bottom mt-5">--}}
{{--                                <div class="post-tags">--}}
{{--                                    <span>Tags</span>--}}
{{--                                    <a href="">Health</a>--}}
{{--                                    <a href="">Game</a>--}}
{{--                                    <a href="">Tour</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="comment-form ">
                        <h3 class="title-normal">Comment Now</h3>
                        <form action="{{ route('comments.update', $singleNews->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field" id="message" name="content" placeholder="Comment here" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 py-0">
                                    <button class="comments-btn btn btn-primary " type="submit">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="comments" class="comments-block block">
                        <h3 class="news-title">
                            <span>{{ $singleNews->total_comment }} {{ $singleNews->total_comment < 2 ? 'Comment': 'Comments' }}</span>
                        </h3>
                        @if(isset($comments))
                            <ul class="all-comments">
                                @foreach($comments as $comment)
                                    <li>
                                        <div class="comment">
                                            <img class="commented-person" alt="img" src="{{ isset($comment->user->profile->image) ? asset($comment->user->profile->image) : 'http://localhost/project/BlogTest/public/blank-pp.png' }}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="commented-person-name">{{ $comment->user->name }}</span>
                                                    <span class="comment-hour d-block"><i class="fa fa-clock-o mr-2"></i>{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
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
                        <div class="widget mt-md-0">
                            <img class="banner img-fluid" src="{{ asset('/') }}frontend/images/banner-ads/ad-sidebar.png" alt="300x300 ads"/>
                        </div>
                        @if(count($relatedNews) > 1)
                            <div class="widget mt-md-0">
                                <h3 class="news-title">
                                    <span>Related Posts</span>
                                </h3>
                                <div class="post-list-block">
                                    @foreach($relatedNews as $news)
                                        @if($singleNews->id != $news->id)
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
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

