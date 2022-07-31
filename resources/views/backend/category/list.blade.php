@extends('backend.master');
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
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
                                <th>Name</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($categorices as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ ucfirst($category->name) }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('/edit/category/' . $category->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <a href="{{ url('/delete/category/' . $category->id) }}"
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
