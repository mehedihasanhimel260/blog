@extends('backend.master');
@section('content')

<div class="container-fluid px-4">



    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Manage Page Option</h3>
        </div>
        <!-- /.card-header -->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- form start -->
        <form action="{{ url('/weboption/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if (session()->has('seccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Seccess!</strong>{{ session()->get('seccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @foreach ($weboptions as $weboption)


                {{-- <label for="exampleInputFile">About Me Image</label>
                <input type="file" class="custom-file-input" name="about_me_image" id="exampleInputFile"> --}}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">WebSite Title</label>
                    <input type="text" class="form-control" value="{{ $weboption->website_title }}" name="website_title"
                        placeholder="WebSite Title">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">About Me Short</label>
                    <input type="text" class="form-control" value="{{ $weboption->about_me_short }}"
                        name="about_me_short" placeholder="About Me Short">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">About Me Image</label>
                    <input type="file" class="form-control" value="{{ $weboption->about_me_image }}"
                        name="about_me_image" placeholder="About Me Image">

                    <img src="{{ asset('/post/' . $weboption->about_me_image) }}" alt="" height="100px" width="100px">
                </div>



                <div class="form-group">
                    <label for="exampleFormControlSelect1">Facebook Link</label>
                    <input type="text" class="form-control" value="{{ $weboption->fb_link }}" name="fb_link"
                        placeholder="Facebook Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">twitter Link</label>
                    <input type="text" class="form-control" value="{{ $weboption->twitter_link }}" name="twitter_link"
                        placeholder="twitter Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">instagram Link</label>
                    <input type="text" class="form-control" value="{{ $weboption->instagram_link }}"
                        name="instagram_link" placeholder="instagram Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">linkedin Link</label>
                    <input type="text" class="form-control" value="{{ $weboption->linkedin_link }}" name="linkedin_link"
                        placeholder="linkedin Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Subscribe Blog Text</label>
                    <input type="text" class="form-control" value="{{ $weboption->subscribe_blog }}"
                        name="subscribe_blog" placeholder="Subscribe Blog Text">
                </div>

            </div>
            <!-- /.card-body -->
            @endforeach
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
