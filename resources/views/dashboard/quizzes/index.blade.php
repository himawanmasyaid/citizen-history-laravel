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
            <table class="table table-bordered table-md" style="border: 2px solid black">
                <thead>
                    <tr>
                        <th>No</th>
                        <th colspan="4">Question</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                    <tr style="border: 2px solid black">
                        <td class="col-md-1" rowspan="2" style="border: 2px solid black" align="center">{{
                            $loop->iteration }}</td>
                        <td class="col-md-7" colspan="4" style="border: 2px solid black">{{
                            $quiz->question }}</td>
                        <td class="col-md-2" rowspan="2" style="border: 2px solid black" align="center">{{
                            $quiz->category->name }}</td>
                        <td class="col-md-2" rowspan="2" style="border: 2px solid black" align="center">
                            <a href="/dashboard/quizzes/{{ $quiz->id }}" class="badge bg-info"><i
                                    class="fas fa-eye"></i></a>
                            <a href="/dashboard/quizzes/{{ $quiz->id }}/edit" class="badge bg-warning"><i
                                    class="fas fa-edit"></i></span></a>
                            <form action="/dashboard/quizzes/{{ $quiz->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="bagde bg-danger border-0 rounded"
                                    onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        @foreach(['A', 'B', 'C', 'D'] as $option)
                        @php
                        $isCorrect = $quiz->correctAnswer === "option{$option}";
                        $bgColor = $isCorrect ? 'bg-success' : '';
                        @endphp
                        <td class="{{ $bgColor }}">{{ $option }}. {{ $quiz["option{$option}"] }}</td>
                        @endforeach
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