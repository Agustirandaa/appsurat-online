@php
$suratMasuk = \App\Models\SuratMasuk::all();
$jumlahSuratBelumDidisposisi = $suratMasuk->where('status', 'Belum didisposisi')->count();

$suratKeluar = \App\Models\SuratKeluar::all();
$jumlahSuratBelumDicek = $suratKeluar->where('status_check', 'Belum Dicek')->count();
$jumlahSuratTidakDisetujui = $suratKeluar->where('status_check', 'Tidak Disetujui')->count();

$showDotNotif = $jumlahSuratBelumDidisposisi + $jumlahSuratBelumDicek + $jumlahSuratTidakDisetujui;
@endphp

<section id="navbar">
    <nav class="navbar">
        
        <div class="col">
            <div class="menu-btn">
                <i class='bx bx-menu'></i>
            </div>
        </div>
        <div class="col d-flex justify-content-end">
            <div class="dropstart me-3">
                @if ($showDotNotif > 0)
                <span class="notif-icon"></span>
                @endif
                <a class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bi bi-bell'></i>
                </a>
                <ul class="dropdown-menu" style="width: 20vw">
                    <li class="dropdown-item">
                        <h5 class="fw-bold">Surat Masuk</h5>
                        <div class="row">
                            <div class="col-9">
                                Jumlah surat yang belum didisposisikan
                            </div>
                            <div class="col">
                                <span class="text-danger">: {{  $jumlahSuratBelumDidisposisi }}</span>
                            </div>
                        </div>        
                    </li>
                    <hr class="dropdown-divider">
                    <li class="dropdown-item">
                        <h5 class="fw-bold">Surat Keluar</h5>
                        <div class="row">
                            <div class="col-9">
                                Jumlah surat yang belum dicek
                            </div>
                            <div class="col">
                                <span class="text-danger">: {{  $jumlahSuratBelumDicek }}</span>
                            </div>
                        </div>  
                        
                        <div class="row">
                            <div class="col-9">
                                Jumlah surat yang tidak disetujui
                            </div>
                            <div class="col">
                                <span class="text-danger">: {{  $jumlahSuratTidakDisetujui }}</span>
                            </div>
                        </div>        
                    </li>
                    
                </ul>
            </div>
            
        </div>
    </div>
    
</nav>
</section>