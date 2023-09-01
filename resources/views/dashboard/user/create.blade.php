@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

@if (session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="row">
    <div class="col-lg-5">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <form action="/dashboard/pengaturan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group mb-2">
                            <label for="name" class="form-label"> Nama</label>
                            <input type="text" name="name" class="form-control mt-2 @error('name')
                            is-invalid
                            @enderror" autocomplete="off" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group mb-2">
                            <label for="username" class="form-label"> Username</label>
                            <input type="text" name="username" class="form-control mt-2 @error('username')
                            is-invalid
                            @enderror" autocomplete="off" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6 form-group mb-2">
                            <label for="email" class="form-label"> Email</label>
                            <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                            @enderror" autocomplete="off" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group mb-2">
                            <label for="password" class="form-label"> password</label>
                            <input type="text" name="password" class="form-control  @error('password')
                            is-invalid
                            @enderror" autocomplete="off">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">   
                        <div class="col-sm-6 form-group">
                            <label for="nip"> Nip user</label>
                            <input type="text" name="nip" class="form-control @error('nip')
                            is-invalid
                            @enderror" autocomplete="off" value="{{ old('nip') }}">
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <label for="level"> Level User</label>
                            <select class="form-select" name="level" aria-label="Select value">
                                <option selected disabled value="">Select</option>
                                <option value="is_admin">Admin</option>
                                <option value="is_user">User</option>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="row mt-3 mb-5">
                        <div class="col-sm-12 form-group mb-2 ">
                            <label for="image"> Upload Foto</label>
                            <img class="img-preview img-fluid mt-2 d-block col-sm-4">
                            <input type="file" name="image" class="form-control mt-2 @error('image')
                            is-invalid
                            @enderror" id="image" onchange="imagePreview()" required>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-12 form-group mb-2 d-flex justify-content-end">
                            <a href="/dashboard/pengaturan/" role="button" class="btn btn-light fw-bolder me-4 d-flex align-items-center"> <i class='bx bx-left-arrow-alt fs-4'></i> Kembali </a>
                            <button type="submit" class="btn btn-primary fw-bolder d-flex align-items-center"> Tambah 
                                <i class='bx bx-plus fs-4 ms-1'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>    
    function imagePreview() { 
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')
        
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>

@endsection