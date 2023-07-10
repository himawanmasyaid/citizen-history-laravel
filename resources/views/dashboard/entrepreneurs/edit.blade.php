@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form method="post" action="/dashboard/entrepreneurs/{{ $entrepreneur->id }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    {{-- name --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $entrepreneur->name) }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="hidden" name="oldImage" value="{{ $entrepreneur->image }}">
                            @if ($entrepreneur->image)
                            <img src="{{ asset('storage/' . $entrepreneur->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('id') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- desc --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="desc" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desc</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc"
                                name="desc">{{Request::old('desc', $entrepreneur->desc)}}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="address"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address">{{Request::old('address', $entrepreneur->address)}}</textarea>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- no Telp --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="no" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telp</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('no') is-invalid @enderror" id="no" name="no"
                                value="{{ old('no', $entrepreneur->no) }}">
                            @error('no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- maps --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="maps" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maps</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps"
                                name="maps" value="{{ old('maps', $entrepreneur->maps) }}">
                        </div>
                    </div>

                    {{-- button --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // disable upload image trix
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection