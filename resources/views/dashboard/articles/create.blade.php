@extends('dashboard.layouts.main')

@section('container')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/articles" class="mb-5" enctype="multipart/form-data">
                    @csrf

                    {{-- title --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="title" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name='title' value="{{ old('title') }}">
                            @error('title')
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
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('id') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- body --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="body" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                        <div class="col-sm-12 col-md-7">
                            @error('body')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>

                    {{-- button --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Create Article</button>
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