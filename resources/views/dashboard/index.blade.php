@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <h1 class="fw-bold">Dashboard</h1>
</div>

<div class="container-fluid">
    <div class="row mt-5 mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0" style="background-color: #B2CCFF;">
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-8 text">
                            <i class="bi bi-download fs-2"></i><br><br>
                            <span class="fs-5">JUMLAH SURAT MASUK</span>
                        </div>
                        <div class="col">
                            <div class="border border-dark rounded-1 mt-3 text-center fs-1 py-2">
                                {{$jumlahSuratMasuk}}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/laporan/surat-masuk" class="card-footer text-decoration-none text-white bg-primary d-flex align-items-center justify-content-end fs-5 fw-normal">Lihat detail
                    <i class='bi bi-arrow-right-circle text-end ms-3 fs-4'></i>
                </a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0" style="background-color: #B2CCFF;">
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-8 text">
                            <i class="bi bi-upload fs-2"></i><br><br>
                            <span class=" fs-5">JUMLAH SURAT KELUAR</span>
                        </div>
                        <div class="col">
                            <div class="border border-dark rounded-1 mt-3 text-center fs-1 py-2">
                                {{ $jumlahSuratKeluar }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/laporan/surat-keluar" class="card-footer text-decoration-none text-white bg-primary d-flex align-items-center justify-content-end fs-5 fw-normal">Lihat detail
                    <i class='bi bi-arrow-right-circle text-end ms-3 fs-4'></i>
                </a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0" style="background-color: #B2CCFF;">
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-8 text">
                            <i class="bi bi-envelope-check fs-2"></i><br><br>
                            <span class=" fs-5">JUMLAH SURAT DISPOSISI</span>
                        </div>
                        <div class="col">
                            <div class="border border-dark rounded-1 mt-3 text-center fs-1 py-2">
                                {{ $jumlahSuratDisposisi }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/laporan/surat-disposisi" class="card-footer text-decoration-none text-white bg-primary d-flex align-items-center justify-content-end fs-5 fw-normal">Lihat detail
                    <i class='bi bi-arrow-right-circle text-end ms-3 fs-4'></i>
                </a>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0" style="background-color: #B2CCFF;">
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-8 text">
                            <i class="bi bi-send fs-2"></i><br><br>
                            <span class=" fs-5">JUMLAH SURAT DISETUJUI</span>
                        </div>
                        <div class="col">
                            <div class="border border-dark rounded-1 mt-3 text-center fs-1 py-2">
                                {{ $jumlahSuratDisetujui }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/laporan/surat-disetujui" class="card-footer text-decoration-none text-white bg-primary d-flex align-items-center justify-content-end fs-5 fw-normal">Lihat detail
                    <i class='bi bi-arrow-right-circle text-end ms-3 fs-4'></i>
                </a>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card" style="background-color: #B2CCFF;">
                <div class=" card-header bg-primary text-white text-center p-2 fs-5">
                    Statistik data bulan ini
                </div>
                <div class="card-body">
                    <div id="myChartPie" style="width: 100%; height: 42vh;" data-surat-masuk='{{ $jumlahSuratMasukBulanIni }}' data-surat-keluar='{{ $jumlahSuratKeluarBulanIni }}'></div>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-9">
            <div class="card" style="background-color: #B2CCFF;">
                <div class=" card-header bg-primary text-white text-center p-2 fs-5">
                    Statistik sepanjang tahun (12 bulan terakhir)
                </div>
                <div class="card-body">
                    <div id="myChartBar" style="width: 100%; height: 42vh;"></div>
                </div>
            </div>
        </div>
        
    </div>
    
    
</div>

@endsection