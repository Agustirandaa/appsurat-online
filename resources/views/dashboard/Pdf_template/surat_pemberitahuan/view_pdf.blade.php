@extends('dashboard.Pdf_template.partials.header_cop')

@section('body')

<div class="title-surat">
    <h5 class="text-center text-decoration-underline fw-bold">SURAT PEMBERITAHUAN </h5>
    <p class="text-center">{{ $surat->nomor_surat }}</p>
</div>

<div class="body-name">
    <table>
        <tr>
            {{ $dataDetail->body_surat }}
        </tr>
        <br/><br>
        <tr>
            <td>Hari / Tanggal</td>
            <td>:</td>
            <td>{{ $dataDetail->hari_tanggal }}</td>
        </tr>
        <tr>
            <td>Acara</td>
            <td>:</td>
            <td>{{ $dataDetail->acara }}</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td>{{ $dataDetail->pukul }} </td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $dataDetail->tempat }} </td>
        </tr>
        <tr>
            <td>Peserta</td>
            <td>:</td>
            <td>{{ $dataDetail->peserta }}</td>
        </tr>
    </table>
    <br>
    
    <p>Demikian surat Pemberitahuan ini disampaikan dan dapat digunakan sebagaimana mestinya</p>
    
    <div class="body-ttd mt-4">
        <div class="row">
            <div class="col-5 offset-7 p-3">
                <p>Mengetahui,</p>
                <p>Ketua Prodi Teknologi Informasi</p>
                
                @if ($surat->status_check == 'Disetujui')
                <div class="visible-print mb-3">
                    {!! QrCode::size(80)->generate(Request::url()); !!}
                </div>
                <p>{{ $surat->name_check }}</p>
                @else   
                <p>Surat belum di setujui</p>
                @endif             
                
            </div>
        </div>
    </div>
    <p>* Dokumen ini tidak memerlukan tanda tangan karna dicetak secara komputerisasi</p>
    
</div>


<div class="fixed-bottom d-flex justify-content-end">
    <img src="/img/blu.png" width="60" alt="Logo blue speed">
</div>
@endsection