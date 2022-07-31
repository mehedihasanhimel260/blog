@extends('frontend.master')
@section('content')
    <div class="container pt-4 mt-5">
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <div class="row">

                    @foreach ($categoryPost as $category)
                        <div class="card post-item bg-transparent border-0 mb-5">
                            <a href="{{ url('/singlepost/' . $category->id) }}">
                                <img class="card-img-top rounded-0" src="{{ asset('/post/' . $category->image) }}"
                                    alt="">
                            </a>
                            <div class="card-body px-0">
                                <h2 class="card-title">
                                    <a class="text-white opacity-75-onHover"
                                        href="{{ url('/singlepost/' . $category->id) }}">{{ ucfirst($category->title) }}</a>
                                </h2>
                                <ul class="post-meta mt-3">
                                    <li class="d-inline-block mr-3">
                                        <span class="fas fa-clock text-primary"></span>
                                        <a class="ml-1" href="#">
                                            {{ $category->updated_at->diffForHumans() }}</a>
                                    </li>
                                    <li class="d-inline-block">
                                        <span class="fas fa-list-alt text-primary"></span>
                                        <a class="ml-1"
                                            href="#">{{ $category->user ? $category->user->name : 'Gust User' }}</a>
                                    </li>
                                </ul>
                                @if (strlen($category->description) > 200)
                                    <p class="card-text my-4">{{ substr($category->description, 0, 200) }}</p>
                                @endif
                                <a href="{{ url('/singlepost/' . $category->id) }}" class="btn btn-primary">Read More
                                    <img src="{{ asset('/frontend/assets/') }}/images/arrow-right.png" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end of post-item -->

                {{ $categoryPost->links() }}
            </div>
        </div>
    </div>
    <!-- Page content-->
    {{-- <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Featured blog post-->
                @foreach ($category as $category)
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ asset('/post/' . $category->image) }}"
                                alt="..." width="284px" height="284px" /></a>
                        <div class="card-body">
                            <div class="small text-muted">
                                {{ $category->updated_at->diffForHumans() }}|{{ $category->user ? $category->user->name : 'Gust User' }}
                            </div>
                            <h2 class="card-title">{{ ucfirst($category->title) }}</h2>
                            <p class="card-text">{{ ucfirst($category->description) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
