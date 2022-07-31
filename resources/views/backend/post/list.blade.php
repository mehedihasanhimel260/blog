@extends('backend.master');
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Post List
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>

                            @if (session()->has('seccess'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Seccess!</strong>{{ session()->get('seccess') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->category ? $post->category->name : '' }}</td>
                                    <td>{{ ucfirst($post->title) }}</td>
                                    <td>
                                        <img src="{{ asset('/post/' . $post->image) }}" alt="" height="100px"
                                            width="100px">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('/edit/post/' . $post->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('/delete/post/' . $post->id) }}"
                                                onclick="return confirm('Are you sure this info delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
