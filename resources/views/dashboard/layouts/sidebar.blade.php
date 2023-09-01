<section id="sidebar">
    <div class="side-bar">
        <div class="header-sidebar">
            <div class="header-img me-3">
                <img src="/img/ti.png" width="70" alt="Teknologi infromasi">
            </div>
            <div class="header-title">
                <span>E - Surat</span>
            </div>
        </div>
        <div class="menu">
            <span>Main</span>
            <div class="item">
                <a href="/dashboard" class="d-flex align-items-center"><i class='bi bi-display'></i>Dahsboard</a>
            </div>
            
            @can('is_admin')
            <span>Role</span>
            <div class="item">
                <a href="/dashboard/pengaturan" class="d-flex align-items-center"><i class='bi bi-gear'></i>Pengaturan</a>
            </div>
            @endcan
            
            @can('is_admin')
            <span>Input surat</span>
            <div class="item">
                <a class="sub-btn-item d-flex align-items-center" href="#"><i class='bi bi-envelope'></i>Transaksi Surat <i class='bi bi-chevron-right icon-dropdown'></i></a>
                <div class="sub-menu">
                    <a href="/transaksi/surat-masuk" class="sub-item"><i class='bi bi-download'></i>Surat Masuk</a>
                    <a href="/transaksi/surat-keluar" class="sub-item"><i class='bi bi-upload'></i>Surat Keluar</a>
                </div>
            </div>
            @endcan
            
            <span>Laporan surat</span>
            <div class="item">
                <a class="sub-btn-item d-flex align-items-center" href="#"><i class='bi bi-journal-bookmark'></i>Laporan surat <i class='bi bi-chevron-right icon-dropdown'></i></a>
                <div class="sub-menu">
                    <a href="/laporan/surat-masuk" class="sub-item"><i class='bi bi-download'></i>Surat Masuk</a>
                    <a href="/laporan/surat-keluar" class="sub-item"><i class='bi bi-upload'></i>Surat Keluar</a>
                    <a href="/laporan/surat-disposisi" class="sub-item"><i class='bi bi-file-earmark-break'></i>Surat Disposisi</a>
                    <a href="/laporan/surat-disetujui" class="sub-item"><i class='bi bi-file-earmark-check'></i>Surat Disetujui</a>
                </div>
            </div>
            <span>Galery surat</span>
            <div class="item mb-5">
                <a class="sub-btn-item d-flex align-items-center" href="#"><i class='bi bi-file-earmark-richtext'></i>Gallery Surat <i class='bi bi-chevron-right icon-dropdown'></i></a>
                <div class="sub-menu">
                    <a href="/gallery/surat-masuk" class="sub-item"><i class='bi bi-download'></i>Surat Masuk</a>
                    <a href="/gallery/surat-keluar" class="sub-item"><i class='bi bi-upload'></i>Surat Keluar</a>
                </div>
            </div>
            
            <div class="item">
                <div class="dropend text-dark">
                    <i class='bi bi-person-circle fs-3 icon'></i>
                    <a href="#" class="ms-4 dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                        {{ auth()->user()->name }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu text-bg-primary">
                        <li><a class="dropdown-item text-bg-primary" href="{{ route('userprofile') }}"><i class='bx bx-user'></i>User Profile</a></li>
                        <li><a class="dropdown-item text-bg-primary" href="{{ route('setpassword') }}"><i class='bx bx-key'></i>Ubah Password</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item text-bg-primary" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout"><i class='bx bx-log-out-circle'></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>