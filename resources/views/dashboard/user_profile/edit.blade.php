@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>{{ $title }}</span>
</div>


<div class="container-fluid mt-5">
    <form action="{{ route('updateuserprofile', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row gap-4">
            <div class="col-md-3 bg-sky p-4 rounded">
                <div class="card p-3 bg-sky d-flex align-items-center">
                    <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                    @if ( auth()->user()->image )
                    <img src="{{ asset('storage/'.auth()->user()->image) }}" class="card-img-top img-preview img-fluid" style="max-width: 50%;">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <div class="card-body">
                        <div class="form-group mb-2 ">
                            <input type="file" name="image" class="form-control mt-2 @error('image')
                            is-invalid
                            @enderror" id="image" aria-describedby="image" onchange="previewImage()"> 
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 bg-sky px-4 py-4 rounded">
                <div class="row mt-3 ">
                    <div class=" form-group mb-2">
                        <label for="name" class="fw-bold"> Nama</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control mt-2" id="name" aria-describedby="name">       
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class=" form-group mb-2">
                        <label for="nip" class="fw-bold"> Nip</label>
                        <input type="text" name="nip" value="{{ auth()->user()->nip }}" class="form-control mt-2 @error('nip')
                        is-invalid
                        @enderror" id="nip" aria-describedby="nip">
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class=" form-group mb-2">
                        <label for="email" class="fw-bold"> Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control mt-2 @error('email')
                        is-invalid
                        @enderror" id="email" aria-describedby="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col form-group mb-2 d-flex justify-content-end">
                        <a href="/dashboard/userprofile" role="button" class="btn btn-light fw-bolder me-4"> Kembali </a>
                        <button type="submit" class="btn btn-primary fw-bolder "> Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script>
    function previewImage() { 
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')
        
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }  
</script>

@endsection