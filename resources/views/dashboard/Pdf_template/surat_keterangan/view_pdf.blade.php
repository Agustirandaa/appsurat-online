@extends('dashboard.Pdf_template.partials.header_cop')

@section('body')

<div class="title-surat">
    <h5 class="text-center text-decoration-underline fw-bold">SURAT KETERANGAN </h5>
    <p class="text-center">{{ $surat->nomor_surat }}</p>
</div>

<p> Ketua Program Studi Teknologi Informasi Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh menerangkan bahwa :</p>

<div class="body-name">
    <table>
        
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $dataDetail->nama }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $surat->status }}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>{{ $dataDetail->program_studi }}</td>
        </tr>
        
        @if ($surat->suratketerangan->judul_artikel != null)
        <tr>
            <td>Judul Artikel</td>
            <td>:</td>
            <td>{{ $surat->suratketerangan->judul_artikel }}</td>
        </tr>
        @endif
        
    </table>
    <br>
    <div class="body-content" style="text-align: justify;">
        <p>{{ $surat->suratketerangan->body_surat }}</p>
    </div>
    <p>Demikian surat keterangan ini disampaikan dan dapat digunakan sebagaimana mestinya.</p>
    
    <div class="body-ttd mt-4">
        <div class="row">
            <div class="col-5 offset-7 p-3">
                <p>Banda Aceh,</p>
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