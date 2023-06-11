@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form method="post" action="/dashboard/entrepreneurs" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    {{-- name --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
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
                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc"
                                value="{{ old('desc') }}"></textarea>
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
                                name="address" value="{{ old('address') }}"></textarea>
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
                                value="{{ old('no') }}">
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
                                name="maps" value="{{ old('maps') }}">
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