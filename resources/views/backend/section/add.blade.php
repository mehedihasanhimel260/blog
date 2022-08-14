@extends('backend.master');
@section('content')

<div class="container-fluid px-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Manage section</h3>
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
        <form action="{{ url('/section/store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="exampleFormControlSelect1">Section one</label>
                    <select name="section_1" class="form-control" id="exampleFormControlSelect1">
                        <option selected>Select Section</option>
                        @foreach ($categories as $catacgory)
                        <option value="{{ $catacgory->id }}"
                            {{ $catacgory->id ==  $catacgory->id  ? 'selected ' : '' }}>{{ $catacgory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Section two</label>
                    <select name="section_2" class="form-control" id="exampleFormControlSelect1">
                        <option selected>Select Section</option>
                        @foreach ($categories as $catacgory)
                        <option value="{{ $catacgory->id }}"
                            {{ $catacgory->id ==  $catacgory->id  ? 'selected ' : '' }}>{{ $catacgory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Section Three</label>
                    <select name="section_3" class="form-control" id="exampleFormControlSelect1">
                        <option selected>Select Section</option>
                        @foreach ($categories as $catacgory)
                        <option value="{{ $catacgory->id }}"
                            {{ $catacgory->id ==  $catacgory->id  ? 'selected ' : '' }}>{{ $catacgory->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection
