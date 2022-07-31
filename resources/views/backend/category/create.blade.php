@extends('backend.master');
@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                </div>
                <!-- /.card-header -->

                @if (session()->has('seccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Seccess!</strong>{{ session()->get('seccess') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- form start -->
                <form action="{{ url('/category/store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input name="category" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Category">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>




        </div>
    </main>
@endsection
