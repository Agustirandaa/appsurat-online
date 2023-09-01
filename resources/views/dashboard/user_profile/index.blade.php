@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>{{ $title }}</span>
</div>

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="row my-5">
    <div class="col-md-1 d-flex">
        <a href="{{ route('edit', ['id' => auth()->user()->id]) }}" role="button" class="btn btn-primary fw-bolder d-flex align-items-center">Ubah Profil</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3 p-2 d-flex justify-content-center">
        <div class="card p-3 bg-sky d-flex align-items-center justify-content-center">
            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('img/not_image.png') }}" alt="User Image" class="img-fluid" style="max-width: 50%">  
        </div>
    </div>
    <div class="col-md-8 p-2">
        <div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs-5">
            <div class="col-md-2 bg-sky p-3 fw-bold">
                Nama
            </div>
            <div class="col-md-8 bg-sky p-3">
                {{ auth()->user()->name }}
            </div>
        </div>
        <div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs-5">
            <div class="col-md-2 bg-sky p-3 fw-bold">
                Username
            </div>
            <div class="col-md-8 bg-sky p-3">
                {{ auth()->user()->username }}
            </div>
        </div>
        <div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs-5">
            <div class="col-md-2 bg-sky p-3 fw-bold">
                Nip
            </div>
            <div class="col-md-8 bg-sky p-3">
                {{ auth()->user()->nip }}
            </div>
        </div>
        <div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs-5">
            <div class="col-md-2 bg-sky p-3 fw-bold">
                Email
            </div>
            <div class="col-md-8 bg-sky p-3">
                {{ auth()->user()->email }}
            </div>
        </div>
    </div>
</div>

@endsection