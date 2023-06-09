@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>

@endif

<div class="table-responsive col-lg-12">

      <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Desc</th> --}}
                <th scope="col">No Telp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrepreneurs as $entrepreneur)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $entrepreneur->name }}</td>
                {{-- <td>{{ $entrepreneur->desc }}</td> --}}
                <td>{{ $entrepreneur->no }}</td>
                <td>
                    <a href="/dashboard/entrepreneurs/{{ $entrepreneur->id }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                    <a href="/dashboard/entrepreneurs/{{ $entrepreneur->id }}/edit" class="badge bg-warning"><i class="fas fa-edit"></i></span></a>
                    <form action="/dashboard/entrepreneurs/{{ $entrepreneur->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="bagde bg-danger border-0 rounded" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection
