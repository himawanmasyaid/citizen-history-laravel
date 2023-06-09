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
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    <a href="/dashboard/articles/{{ $article->id }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                    <a href="/dashboard/articles/{{ $article->id }}/edit" class="badge bg-warning"><i class="fas fa-edit"></i></span></a>
                    <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
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
