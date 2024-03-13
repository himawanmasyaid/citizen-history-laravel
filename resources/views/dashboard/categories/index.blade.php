@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger col-lg-12" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <thead>
                    <tr>

                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td class="col-md-1">{{ $loop->iteration }}</td>
                        <td class="col-md-2">{{ $category->name }}</td>
                        <td class="col-md-7">{{ $category->desc }}</td>
                        <td class="col-md-2">
                            {{-- <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-info"><i
                                    class="fas fa-eye"></i></a> --}}
                            <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><i
                                    class="fas fa-edit"></i></span></a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
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