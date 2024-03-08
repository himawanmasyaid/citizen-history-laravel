@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/quizzes" class="mb-5" enctype="multipart/form-data">
                    @csrf

                    {{-- question --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="question"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('question') is-invalid @enderror" id="question"
                                name="question">{{ old('question') }}</textarea>
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
                                name='optionA' value="{{ old('optionA') }}">
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
                                name='optionB' value="{{ old('optionB') }}">
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
                                name='optionC' value="{{ old('optionC') }}">
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
                                name='optionD' value="{{ old('optionD') }}">
                            @error('optionD')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    {{-- Select Dropdown --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="correctAnswer" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Correct
                            Option</label>
                        <div class="col-sm-12 col-md-2">
                            <select class="form-control @error('correctAnswer') is-invalid @enderror"
                                name="correctAnswer" id="correctAnswer">
                                <option selected>Correct Option</option>
                                @foreach(['A', 'B', 'C', 'D'] as $option)
                                <div class="form-check">
                                    <option value="option{{ $option }}"> Option {{ $option }}</option>
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
                            <button type="submit" class="btn btn-primary">Create Quiz</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection