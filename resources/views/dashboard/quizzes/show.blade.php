@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row card">
        <div class="col-lg-8 ">
            <a href="/dashboard/quizzes" class="btn bg-info mb-3 mt-3">Kembali</a>
            <a href="/dashboard/quizzes/{{ $quiz->id }}/edit" class="btn bg-warning mb-3 mt-3">Edit</a>
            <form action="/dashboard/quizzes/{{ $quiz->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mb-3 mt-3" onclick="return confirm('Are you sure ?')">Hapus</button>
            </form>
            <article>

                <div>
                    @if ($quiz->image)
                    <img src="{{ asset('storage/' . $quiz->image) }}" style="width:50%;height:auto">
                    @endif
                </div>

                <p class="mt-3"><b>Question :</b> {{ $quiz->question }}</p>
                <ol type="A">
                    @foreach(['A', 'B', 'C', 'D'] as $option)
                    @php
                    $isCorrect = $quiz->correctAnswer === "option{$option}";
                    $fontColor = $isCorrect ? 'Green' : '';
                    $fontStyle = $isCorrect ? 'bold' : '';
                    @endphp
                    <li style="color:{{ $fontColor }}; font-weight:{{ $fontStyle }}">{{ $quiz["option{$option}"] }}</li>
                    @endforeach
                </ol>
            </article>

        </div>
    </div>
</div>
@endsection