@extends('dashboard.Pdf_template.partials.header_cop')

@section('body')

<h2 class="text-center">Laporan Surat keluar</h2>

{{-- Untuk cetak laporan --}}
@if (session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<table class="table table-bordered mt-4" style="width: 100%; margin-right: calc(4%);">
    <tbody>
        <tr>
            <td style="width: 12.2378%; text-align: center;" class="fw-bold">No</td>
            <td style="width: 37.5138%; text-align: left;" class="fw-bold">Surat Keluar</td>
            <td style="width: 50.1187%; text-align: center;" class="fw-bold">Jumlah</td>
        </tr>
        <tr>
            <td style="width: 12.2378%; text-align: center;">1</td>
            <td style="width: 37.5138%; text-align: left;">Surat Keterangan</td>
            <td style="width: 50.1187%; text-align: center;">{{ $jumlahSuratKeterangan }}</td>
        </tr>
        <tr>
            <td style="width: 12.2378%; text-align: center;">2</td>
            <td style="width: 37.5138%; text-align: left;">Surat Permohonan</td>
            <td style="width: 50.1187%; text-align: center;">{{ $jumlahSuratPermohonan }}</td>
        </tr>
        <tr>
            <td style="width: 12.2378%; text-align: center;">3</td>
            <td style="width: 37.5138%; text-align: left;">Surat Pemberitahuan</td>
            <td style="width: 50.1187%; text-align: center;">{{ $jumlahSuratPemberitahuan }}</td>
        </tr>
        <tr>
            <td style="width: 49.7046%; text-align: center;" colspan="2" class="fw-bold">Total</td>
            <td style="width: 50.1187%; text-align: center;">{{ $totalSurat }}</td>
        </tr>
    </tbody>
</table>

<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 20.5729%;">Dari tanggal</td>
            <td style="width: 4.0192%;">:</td>
            <td style="width: 75.3387%;">{{ date('d-m-Y', strtotime($startdate)) }}</td>
            
        </tr>
        <tr>
            <td style="width: 20.5729%;">Sampai tanggal</td>
            <td style="width: 4.0192%;">:</td>
            <td style="width: 75.3387%;">{{ date('d-m-Y', strtotime($enddate)) }}</td>
            
        </tr>
        <tr>
            <td style="width: 20.5729%;">Semester</td>
            <td style="width: 4.0192%;">:&nbsp;</td>
            <td style="width: 75.3387%;">{{ $semester }}</td>
        </tr>
    </tbody>
</table>
<div class="body-ttd mt-4">
    <div class="row">
        <div class="col-5 offset-7 p-3">
            <p>Mengetahui,</p>
            <p>Ketua Prodi Teknologi Informasi</p>
            
            <div class="visible-print mb-3">
                {!! QrCode::size(60)->generate(Request::url()); !!}
            </div>
            <p>{{ $user->name }}</p>         
            
        </div>
    </div>
</div>
<p>* Dokumen ini tidak memerlukan tanda tangan karna dicetak secara komputerisasi</p>
<div class="fixed-bottom d-flex justify-content-end">
    <img src="/img/blu.png" width="60" alt="Logo blue speed">
</div>
@endsection