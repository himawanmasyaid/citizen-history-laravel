@extends('dashboard.layouts.main')

@section('container')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/tours/{{ $tour->id }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- title --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="title" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name='title' value="{{ old('title', $tour->title) }}">
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
                            <input type="hidden" name="oldImage" value="{{ $tour->image }}">
                            @if ($tour->image)
                            <img src="{{ asset('storage/' . $tour->image) }}"
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
                                name="desc">{{Request::old('desc', $tour->desc)}}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- video --}}
                    {{-- <div class="form-group row mb-4 mt-4">
                        <label for="video" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video</label>
                        <div class="col-sm-12 col-md-7"> --}}
                            {{-- <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('id') is-invalid @enderror" type="file" id="video"
                                name="video" onchange="previewImage()"> --}}
                            {{-- <input class="form-control @error('id') is-invalid @enderror" type="file" id="video"
                                name="video">
                            @error('video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- video Link --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="link" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                                name="link" value="{{ old('link', $tour->link) }}">
                        </div>
                    </div>

                    {{-- button --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Edit Virtual Tour</button>
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