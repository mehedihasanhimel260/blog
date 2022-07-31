@extends('backend.master');
@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Post</h3>
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
                <form action="{{ url('/post/store') }}" method="POST" enctype="multipart/form-data">
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



                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select name="catecory_id" class="form-control" id="exampleFormControlSelect1">
                                <option selected>Select Catagory</option>
                                @foreach ($categories as $catacgory)
                                    <option value="{{ $catacgory->id }}">{{ $catacgory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Post Title">
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Image Input</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </main>
@endsection
