@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/categories/{{ $category->id }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- category --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name='name' value="{{ old('name', $category->name) }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- desc --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="desc"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-4">
                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc"
                                name="desc">{{ old('desc',$category->desc) }}</textarea>
                            @error('desc')
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
                            <button type="submit" class="btn btn-primary">Edit Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection