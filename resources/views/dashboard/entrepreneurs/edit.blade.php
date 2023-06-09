@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8">
    <form method="post" action="/dashboard/entrepreneurs/{{ $entrepreneur->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $entrepreneur->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="desc" class="form-label">Desc</label>
            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">{{Request::old('desc', $entrepreneur->desc)}}</textarea>
            @error('desc')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{Request::old('address', $entrepreneur->address)}}</textarea>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">No Telp</label>
            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" id="noTelp" name="noTelp"
                value="{{ old('noTelp', $entrepreneur->no_telp) }}">
            @error('noTelp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="maps" class="form-label">Maps</label>
            <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps"
                value="{{ old('maps', $entrepreneur->maps) }}">
            @error('maps')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type=" submit" class="btn btn-primary">Tambah Pengusaha</button>
    </form>
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
