@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>{{ $title }}</span>
</div>


@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-error me-3 fs-4'></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="row mt-5">
    <div class="col-md-6">
        <div class="card p-4 bg-sky">
            <form action="{{ route('updatepassword', ['id' => auth()->user()->id]) }}" method="POST">
                @method('put')
                @csrf
                <div class="row mt-3 ">
                    <div class="col form-group mb-2">
                        <label for="passwordlama" class="fw-bold"> Password Lama</label>
                        <input type="text" name="passwordlama" value="{{ old('passwordlama') }}" class="form-control mt-2 @error('passwordlama')
                        is-invalid
                        @enderror" id="passwordlama" aria-describedby="passwordlama" autocomplete="off">
                        @error('passwordlama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col form-group mb-2">
                        <label for="passwordbaru" class="fw-bold"> Password Baru</label>
                        <input type="text" name="passwordbaru" class="form-control mt-2 @error('passwordbaru')
                        is-invalid
                        @enderror" id="passwordbaru" aria-describedby="passwordbaru" autocomplete="off">
                        @error('passwordbaru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col form-group mb-2">
                        <label for="konfirmasipassword" class="fw-bold"> Konfirmasi Password</label>
                        <input type="text" name="konfirmasipassword" class="form-control mt-2 @error('konfirmasipassword')
                        is-invalid
                        @enderror" id="konfirmasipassword" aria-describedby="konfirmasipassword" autocomplete="off">
                        @error('konfirmasipassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col form-group mb-2 d-flex justify-content-end">
                        <a href="{{ route('userprofile') }}" role="button" class="btn btn-light fw-bolder me-4"></i> Kembali </a>
                        <button type="submit"   role="button" class="btn btn-primary fw-bolder "> Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection