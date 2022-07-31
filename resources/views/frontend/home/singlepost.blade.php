@extends('frontend.master')
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-10">
            <img class="img-fluid" src="{{ asset('/post/' . $post->image) }}" alt="">
            <h1 class="text-white add-letter-space mt-4">{{ ucfirst($post->title) }}</h1>
            <ul class="post-meta mt-3 mb-4">
                <li class="d-inline-block mr-3">
                    <span class="fas fa-clock text-primary"></span>
                    <a class="ml-1" href="#"> {{ $post->updated_at->diffForHumans() }}</a>
                </li>
                <li class="d-inline-block">
                    <span class="fas fa-list-alt text-primary"></span>
                    <a class="ml-1" href="#">{{ $post->user ? $post->user->name : 'Gust User' }}</a>
                </li>
            </ul>

            <p>{{ ucfirst($post->description) }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form bg-dark">
                @foreach ($comment as $com)
                    <div class="h4 pb-2 mb-4 text- border-bottom">
                        {{ $com->name }}
                    </div>

                    <div class="p-3  bg-opacity-10 border-start-0 rounded-end">
                        {{ $com->comment }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Lets Comment</h1>
                <form method="get" action="{{ url('/singlepost') }}"class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="post_id" value="{{ $post->id }}" class="d-none">
                            <div class="form-group mb-5">
                                <label for="firstName" class="text-black-300">Your full Name</label>
                                <input name="name" type="text" id="firstName"
                                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="Robert Lee" required>
                                <p class="invalid-feedback">Your Name is required!</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label for="email" class="text-black-300">E-Mail Address</label>
                                <input name="email" type="email" id="email"
                                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="kevin.jones@mail.com" required>
                                <p class="invalid-feedback">Your email is required!</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-5">
                                <label for="message" class="text-black-300">Your message</label>
                                <textarea name="comment" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                    placeholder="Lorem Ipsum is simply dummy text of the printing and..." required></textarea>
                                <p class="invalid-feedback">Message is required!</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary">Send Now <img
                                    src="{{ asset('/frontend/assets/') }}/images/arrow-right.png" alt=""></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
