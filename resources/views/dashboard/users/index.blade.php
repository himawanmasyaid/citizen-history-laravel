@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>

@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <thead>
                    <tr>

                        <th scope="col" class="col-md-2">No</th>
                        <th scope="col" class="col-md-4">Name</th>
                        <th scope="col" class="col-md-3">Username</th>
                        <th scope="col" class="col-md-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="col-md-2">{{ $loop->iteration }}</td>
                        <td class="col-md-4">{{ $user->name }}</td>
                        <td class="col-md-3">{{ $user->username }}</td>
                        <td class="col-md-3">
                            {{-- <a href="/dashboard/users/{{ $user->id }}" class="badge bg-info"><i
                                    class="fas fa-eye"></i></a> --}}
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><i
                                    class="fas fa-edit"></i></span></a>
                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="bagde bg-danger border-0 rounded"
                                    onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- pagination --}}
    {{-- <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div> --}}
</div>

@endsection