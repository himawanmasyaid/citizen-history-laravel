@extends('dashboard.layouts.main')

@section('container')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
                    @csrf

                    {{-- name --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name='name' value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- username --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="username"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name='username' value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{-- password --}}
                    <div class="form-group row mb-4 mt-4">
                        <label for="password"
                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name='password'>
                            @error('password')
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
                            <button type="submit" class="btn btn-primary">Add User</button>
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