@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/quizzes/{{ $quiz->id }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- Select Category --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="category"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('category') is-invalid @enderror" name="category"
                                id="category">

                                @foreach($categories as $category)

                                @php
                                $isCategory = $quiz->category_id === $category->id;
                                $selected = $isCategory ? 'selected' : ' ';
                                @endphp


                                <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- question --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="question"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('question') is-invalid @enderror" id="question"
                                name="question">{{ old('question', $quiz->question) }}</textarea>
                            @error('question')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- option A --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="optionA" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option
                            A</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('optionA') is-invalid @enderror" id="optionA"
                                name='optionA' value="{{ old('optionA', $quiz->optionA) }}">
                            @error('optionA')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- option B --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="optionB" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option
                            B</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('optionB') is-invalid @enderror" id="optionB"
                                name='optionB' value="{{ old('optionB', $quiz->optionB) }}">
                            @error('optionB')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- option C --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="optionC" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option
                            C</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('optionC') is-invalid @enderror" id="optionC"
                                name='optionC' value="{{ old('optionC', $quiz->optionC) }}">
                            @error('optionC')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- option D --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="optionD" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option
                            D</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('optionD') is-invalid @enderror" id="optionD"
                                name='optionD' value="{{ old('optionD', $quiz->optionD) }}">
                            @error('optionD')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- select dropdown --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="correctAnswer" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Correct
                            Option</label>
                        <div class="col-sm-12 col-md-2">
                            <select class="form-control @error('correctAnswer') is-invalid @enderror"
                                name="correctAnswer" id="correctAnswer">
                                @foreach(['A', 'B', 'C', 'D'] as $option)

                                @php
                                $isCorrect = $quiz->correctAnswer === "option{$option}";
                                $selected = $isCorrect ? 'selected' : ' ';
                                @endphp

                                <div class="form-check">
                                    <option value="option{{ $option }}" {{ $selected }}> Option {{ $option }}</option>
                                </div>
                                @endforeach
                            </select>
                            @error('correctAnswer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    {{-- button --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Edit Quiz</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection