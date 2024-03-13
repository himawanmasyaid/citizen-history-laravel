@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row card">
        <div class="col-lg-8 ">
            <a href="/dashboard/articles" class="btn bg-info mb-3 mt-3">Kembali</a>
            <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn bg-warning mb-3 mt-3">Edit</a>
            <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mb-3 mt-3" onclick="return confirm('Are you sure ?')">Hapus</button>
            </form>
            <article>

                @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" style="width:50%;height:auto">
                @endif

                <p>{!! $article->body !!}</p>
            </article>

        </div>
    </div>
</div>
@endsection