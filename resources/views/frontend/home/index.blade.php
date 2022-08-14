@extends('frontend.master')
@section('content')
<div class="container pt-4 mt-5">
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <div class="row">

                @foreach ($posts as $post)
                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{ url('/singlepost/' . $post->id) }}">
                        <img class="card-img-top rounded-0" src="{{ asset('/post/' . $post->image) }}" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover" href="{{ url('/singlepost/' . $post->id) }}">{{
                                ucfirst($post->title) }}</a>
                        </h2>
                        <ul class="post-meta mt-3">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#"> {{ $post->updated_at->diffForHumans() }}</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">{{ $post->user ? $post->user->name : 'Gust User' }}</a>
                            </li>
                        </ul>
                        @if (strlen($post->description) > 200)
                        <p class="card-text my-4">{{ substr($post->description, 0, 200) }}</p>
                        @endif
                        <a href="{{ url('/singlepost/' . $post->id) }}" class="btn btn-primary">Read More <img
                                src="{{ asset('/frontend/assets/') }}/images/arrow-right.png" alt=""></a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end of post-item -->

            {{ $posts->links() }}
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget text-center">
                <img class="author-thumb-sm rounded-circle d-block mx-auto"
                    src="{{ asset('/frontend/assets/') }}/images/author-sm.png" alt="">
                <h2 class="widget-title text-white d-inline-block mt-4">About Me</h2>
                <p class="mt-4">Lorem ipsum dolor sit coectetur adiing elit. Tincidunfywjt leo mi,
                    viearra urna. Arcu ve isus, condimentum ut vulpate cursus por turpis.</p>
                <ul class="list-inline mt-3">
                    <li class="list-inline-item">
                        <a href="#!" class="text-white text-primary-onHover p-2">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="text-white text-primary-onHover p-2">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="text-white text-primary-onHover p-2">
                            <span class="fab fa-instagram"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="text-white text-primary-onHover p-2">
                            <span class="fab fa-linkedin-in"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end of author-widget -->

            <div class="widget bg-dark p-4 text-center">
                <h2 class="widget-title text-white d-inline-block mt-4">Subscribe Blog</h2>
                <p class="mt-4">Lorem ipsum dolor sit coectetur elit. Tincidu nfywjt leo mi, urna. Arcu
                    ve isus, condimentum ut vulpate cursus por.</p>
                <form action="#">
                    <div class="form-group">
                        <input type="email" class="form-control bg-transparent rounded-0 my-4"
                            placeholder="Your Email Address">
                        <button class="btn btn-primary">Subscribe Now <img
                                src="{{ asset('/frontend/assets/') }}/images/arrow-right.png" alt=""></button>
                    </div>
                </form>
            </div>


            <div class="widget bg-dark p-4 text-center">
                <h2 class="widget-title text-white d-inline-block mt-4">Category List</h2>
                <ul class="list-group">
                    @foreach ($categories as $category)
                    <li class="list-group-item bg-dark"><a class="text-white"
                            href="{{ url('/category/post/' . $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- end of subscription-widget -->

            <div class="widget">
                <div class="mb-5 text-center">
                    <h2 class="widget-title text-white d-inline-block">Featured Posts</h2>
                </div>
                @foreach ($featureposts as $featurepost)

                <div class="card post-item bg-transparent border-0 mb-5">
                    <a href="{{ url('/singlepost/' . $featurepost->id) }}">
                        <img class="card-img-top rounded-0" src="{{ asset('/post/' . $featurepost->image) }}" alt="">
                    </a>
                    <div class="card-body px-0">
                        <h2 class="card-title">
                            <a class="text-white opacity-75-onHover"
                                href="{{ url('/singlepost/' . $featurepost->id) }}">{{$featurepost->title}}</a>
                        </h2>
                        <ul class="post-meta mt-3 mb-4">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1"
                                    href="{{ url('/singlepost/' . $featurepost->id) }}">{{ $featurepost->updated_at->diffForHumans() }}</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">{{ $featurepost->category->name }}</a>
                            </li>
                        </ul>
                        <a href="{{ url('/singlepost/' . $featurepost->id) }}" class="btn btn-primary">Read More <img
                                src="{{ asset('/frontend/assets/') }}/images/arrow-right.png" alt=""></a>
                    </div>
                </div>
                @endforeach
                <!-- end of widget-post-item -->
            </div>
            <!-- end of post-items widget -->
        </div>
    </div>
</div>
@endsection
