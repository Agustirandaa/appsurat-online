@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>Gallery surat masuk</span>
</div>


<div class="row">
    
    @foreach ($surats as $surat)
    
    <div class="col-md-2">
        <div class="card card-gallery mt-5 mb-2">
            <div class="card-body">
                <div class="col text-center d-flex flex-column align-items-center">
                    <img src="/img/gfile.png" width="150" alt="Gambar" class="img-fluid mb-2">
                    <span class="fw-bold">{{ $surat->nomor_surat }}</span>
                </div>
                <div class="col text-center mt-2">
                    <a href="/gallery/surat-masuk/{{ $surat->slug }}" target="_blank" class="btn btn-sm btn-primary fs-6">View</a>
                </div>
            </div>
            
        </div>
    </div>
    
    
    @endforeach
    
</div>

@endsection