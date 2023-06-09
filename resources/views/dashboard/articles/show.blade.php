@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 ">
                <article>
                    <a href="/dashboard/articles" class="btn bg-info mb-3">Kembali</a>
                    <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn bg-warning mb-3">Edit</a>
                    <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure ?')">Hapus</button>
                    </form>

                    @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img" alt="{{ $article->food }}">
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $article->food }}" class="card-img" alt="{{ $article->food }}">
                    @endif

                    <p>{!! $article->body !!}</p>
                </article>
                
                <a href="/dashboard/articles">Back</a>
            </div>
        </div>
    </div>
@endsection