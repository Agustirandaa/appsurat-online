@extends('dashboard.layouts.main')


@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row mt-4 mb-4">
    <div class="col-md-3">
        <select class="form-select" id="select-surat">
            <option selected>Pilih Jenis Surat !</option>
            <option value="surat-keterangan">Surat Keterangan</option>
            <option value="surat-permohonan">Surat Permohonan</option>
        </select>
    </div>
</div>


@include('dashboard.transaksi.surat_keluar.createsurat.form_suratpermohonan')
@include('dashboard.transaksi.surat_keluar.createsurat.form_suratketerangan')
{{-- @include('dashboard.transaksi.surat_keluar.layouts.subCreateSuratKeterangan') --}}

@endsection