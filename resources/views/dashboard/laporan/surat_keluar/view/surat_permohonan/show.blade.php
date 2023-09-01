@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>
<div class="row mt-4">
    <div class="col d-flex justify-content-end">
        <a href="{{ request('from') }}" role="button" class="btn btn-primary fw-bolder d-flex align-items-center me-4"> 
            <i class='bx bx-left-arrow-alt fs-5'></i> Kembali
        </a>  
    </div>
</div>

<div class="content-header mt-4 mb-2 rounded-top">
    <div class="row">
        <div class="col text-white d-flex align-items-center fs">
            <i class='bx bx-envelope-open me-3 fs-4'></i>
            <span>{{ $surat->nomor_surat }}</span>
        </div>
    </div>
</div>
<hr>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Persetujuan Surat
    </div>    
    <div class="col-md-8 bg-sky p-3 {{ $surat->status_check == 'Tidak Disetujui' ? 'text-danger' : ($surat->status_check == 'Disetujui' ? 'text-success' : 'text-black') }}">
        Surat {{ $surat->status_check }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold ">
        Tanggal Submit Pengecekan
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->tanggal_check }}
    </div>
</div>


<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold ">
        Catatan Surat
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->catatan }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold ">
        Jenis Surat
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->jenis_surat }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Tujuan Surat
    </div>
    <div class="col-md-8 bg-sky p-3 ">
        {{ $surat->tujuan_surat }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Sifat Surat
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->sifat_surat }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Status
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->status }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Perihal Surat
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->perihal_surat }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Lampiran
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->lampiran }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Tanggal Surat
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ date('d M Y', strtotime($surat->tanggal_surat)) }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-5 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Semester
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->semester }}
    </div>
</div>


@if ($surat->status === 'Mahasiswa')

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Nama
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->mahasiswa->nama }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Nim
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->mahasiswa->nim }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Program Studi
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->mahasiswa->program_studi }}
    </div>
</div>

@elseif($surat->status === 'Dosen')

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Nama
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->dosen->nama }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Nip
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->dosen->nip }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Program Studi
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->dosen->program_studi }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Pangkat / Gol
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->dosen->pangkat_gol }}
    </div>
</div>

<div class="row gap-3 ms-1 mb-2 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        Jabatan
    </div>
    <div class="col-md-8 bg-sky p-3">
        {{ $surat->dosen->jabatan }}
    </div>
</div>

@endif

<div class="row gap-3 ms-1 mb-5 d-flex align-content-center fs">
    <div class="col-md-3 bg-sky p-3 fw-bold">
        View Surat
    </div>
    <div class="col-md-1 p-3">
        <a href="{{ route('viewpdf', ['slug' => $surat->slug, 'jenis' => $surat->jenis_surat, 'category_surat' => $surat->suratpermohonan->category_surat, 'status' => $surat->status]) }}" target="_blank" role="button" class="btn btn-primary fw-bolder d-flex align-items-center me-3"> 
            <i class='bx bx-show-alt fs-5 d-flex align-items-center me-1'></i> View 
        </a>
    </div>
</div>


@endsection
