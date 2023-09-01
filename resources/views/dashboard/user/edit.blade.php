@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <form action="/dashboard/pengaturan/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group mb-2">
                            <label for="name" class="form-label"> Nama</label>
                            <input type="text" name="name" class="form-control mt-2 @error('name')
                            is-invalid
                            @enderror" autocomplete="off" value="{{  $user->name }}" readonly>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>      
                        <div class="col-sm-6 form-group mb-2">
                            <label for="email" class="form-label"> Email</label>
                            <input type="email" name="email" class="form-control mt-2 @error('email')
                            is-invalid
                            @enderror" autocomplete="off" value="{{ old('email', $user->email) }}" readonly>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror     
                        </div>
                    </div>          
                    
                    
                    <div class="row mt-4 mb-5">
                        <div class="col-sm-6 form-group mb-2">
                            <label for="level" class="form-label"> Level User</label>
                            <select class="form-select" name="level" aria-label="Select value">
                                <option selected disabled value="">Select</option>
                                <option value="is_admin" @if ($user->level == 'is_admin') selected @endif>Admin</option>
                                <option value="is_user" @if ($user->level == 'is_user') selected @endif>User</option>
                            </select> 
                        </div>
                        
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-12 form-group mb-2 d-flex justify-content-end">
                            <a href="/dashboard/pengaturan/" role="button" class="btn btn-light fw-bolder me-4 d-flex align-items-center"> <i class='bx bx-left-arrow-alt fs-4'></i> Kembali </a>
                            <button type="submit" class="btn btn-primary fw-bolder d-flex align-items-center"> Update 
                                <i class='bx bx-refresh fs-4 ms-1'></i>
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