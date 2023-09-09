@extends('dashboard.Pdf_template.partials.header_cop')

@section('body')

<div class="body-name">
    <table style="width: 100%;">
        <tbody style="line-height: 15px;">
            <tr>
                <td style="width: 9.0909%;">Nomor</td>
                <td style="width: 3.4965%;">:</td>
                <td style="width: 35.8956%;">{{ $surat->nomor_surat }}</td>
                <td style="width: 51.4004%;">
                    <div style="text-align: right;">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $surat->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') }}</div>
                </td>
            </tr>
            <tr>
                <td style="width: 9.0909%;">Sifat</td>
                <td style="width: 3.4965%;">:</td>
                <td style="width: 35.8956%;">{{ $surat->sifat_surat }}</td>
                <td style="width: 51.4004%;"><br></td>
            </tr>
            <t> 
                <td style="width: 9.0909%;">Lampiran</td>
                <td style="width: 3.4965%;">:</td>
                <td style="width: 35.8956%;">{{ $surat->lampiran }}</td>
                <td style="width: 51.4004%;"><br></td>
            </t>
            <tr >
                <td style="width: 9.0909%; vertical-align: top;">Hal</td>
                <td style="width: 3.4965%; vertical-align: top;">:</td>
                <td style="width: 35.8956%; vertical-align: top;">{{ $surat->perihal_surat }}</td>
                <td style="width: 51.4004%;"><br></td>
            </tr>
        </tbody>
    </table>
    
    <br>
    <div class="mb-2" style="line-height: 18px">
        <span>Kepada Yth.</span><br>
        <span>Dekan Fakultas Sains dan Teknologi</span><br>
        <span>di-</span><br>
        <span>Tempat</span><br>
    </div>
    
    <span class="lh-lg">Assalamu’alaikum Wr.Wb</span><br>
    <span>Dengan Hormat,</span>
    <div class="body-content" style="text-align: justify; text-indent: 50px;">
        Sehubungan dengan adanya pergantian Kepengurusan HIMA TI pada Prodi Teknologi Indfromasi, maka dengan ini kami memohon kepada Bapak agar sudi kiranya menerbitkan SK Pembina HMP Program Studi Teknologi Informasi, Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh. Pembina HMP Prodi Teknologi Informasi atas nama:
    </div>
    
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $dataDetail->nama }}</td>
        </tr>
        <tr>
            <td>Nip</td>
            <td>:</td>
            <td>{{ $dataDetail->nip }}</td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td>:</td>
            <td>{{ $dataDetail->pangkat_gol }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $dataDetail->jabatan }}</td>
        </tr>
    </table>
    <br>
    <p  style="text-indent: 55px;">Demikian kami sampaikan, atas perhatian dan kerjasamanya, kami ucapkan terima  kasih.</p>
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