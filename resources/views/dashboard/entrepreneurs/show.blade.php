@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row card">
        <div class="col-lg-8 ">
            <article>
                <a href="/dashboard/entrepreneurs" class="btn bg-info mb-3">Kembali</a>
                <a href="/dashboard/entrepreneurs/{{ $entrepreneur->id }}/edit" class="btn bg-warning mb-3">Edit</a>
                <form action="/dashboard/entrepreneurs/{{ $entrepreneur->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure ?')">Hapus</button>
                </form>
                @if ($entrepreneur->image)
                <img src="{{ asset('storage/' . $entrepreneur->image) }}" class="card-img"
                    alt="{{ $entrepreneur->food }}">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $article->food }}" class="card-img"
                    alt="{{ $article->food }}">
                @endif
                <p>{!! $entrepreneur->name !!}</p>
                <p>{!! $entrepreneur->desc !!}</p>
                <p>{!! $entrepreneur->address !!}</p>
                <p>{!! $entrepreneur->no !!}</p>
                <p>{!! $entrepreneur->maps !!}</p>
            </article>

            <a href="/dashboard/entrepreneurs">Back</a>
        </div>
    </div>
</div>
@endsection