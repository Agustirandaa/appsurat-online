<!-- Modal Logout -->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5" style="width: 80%;">
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="/img/logout.png" alt="Gambar tong sampah" width="80" class="mb-3">
                <span>Apa kamu yakin </span> <span>ingin keluar ?</span>
                <div class="row mt-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary ps-4 pe-4" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary ps-4 pe-4" data-bs-dismiss="modal">Yakin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Delete Role User --}}
<div class="modal fade" id="deletedModalUser" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5" style="width: 80%;">
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="/img/trash.png" alt="Gambar tong sampah" width="80" class="mb-3">
                <span>Apa kamu yakin ingin </span> <span>surat keluar ini ?</span>
                
                <div class="mt-2" id="show-name-user"></div>
                <div class="row mt-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary ps-4 pe-4" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                        <form id="deletedFormModalUser" action="" method="POST"> 
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary ps-4 pe-4" data-bs-dismiss="modal">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Delete Surat Masuk --}}
<div class="modal fade" id="deletedModalSuratMasuk" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5" style="width: 80%;">
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="/img/trash.png" alt="Gambar tong sampah" width="80" class="mb-3">
                <span>Apa kamu yakin ingin </span> <span>surat keluar ini ?</span>
                
                <div class="mt-2" id="show-nomor-surat-masuk"></div>
                <div class="row mt-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary ps-4 pe-4" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                        <form id="deletedFormModalSuratMasuk" action="" method="POST"> 
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary ps-4 pe-4" data-bs-dismiss="modal">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Delete Surat Keluar --}}
<div class="modal fade" id="deletedModalSuratKeluar" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5" style="width: 80%;">
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="/img/trash.png" alt="Gambar tong sampah" width="80" class="mb-3">
                <span>Apa kamu yakin ingin </span> <span>surat keluar ini ?</span>
                
                <div class="mt-2" id="show-nomor-surat-keluar"></div>
                <div class="row mt-4">
                    <div class="col">
                        <button type="button" class="btn btn-secondary ps-4 pe-4" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                        <form id="deletedFormModalSuratKeluar" action="" method="POST"> 
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary ps-4 pe-4" data-bs-dismiss="modal">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Filters Surat Masuk --}}
<div class="modal fade" id="searchFilterLaporanSuratMasuk" tabindex="-1" aria-labelledby="searchFilterLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="/laporan/surat-masuk" method="GET">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchFilterLabel">Search by Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">  
                        <div class="col-sm-6 form-group">
                            <label for="pengirim" class="fw-bold"> Pengirim</label>
                            <input type="text" name="pengirim" value="{{ request('pengirim') }}" class="form-control" id="star_date" autocomplete="off"> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="semester" class="fw-bold"> Semester</label>
                            <select class="form-select" name="semester" aria-label="Select value">
                                <option selected value="">Select</option>
                                <option value="Ganjil"{{ request('semester') === 'Ganjil' ? ' selected' : '' }}>Ganjil</option>
                                <option value="Genap"{{ request('semester') === 'Genap' ? ' selected' : '' }}>Genap</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="start_date" class="fw-bold"> Start Tanggal</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" id="star_date" autocomplete="off"> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="end_date" class="fw-bold"> End Tanggal</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" id="end_date" autocomplete="off"> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Filters</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Modal Filters Surat Keluar--}}
<div class="modal fade" id="searchFilterLaporanSuratKeluar" tabindex="-1" aria-labelledby="searchFilterLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="/laporan/surat-keluar" method="GET">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchFilterLabel">Search by Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">  
                        <div class="col-sm-6 form-group">
                            <label for="semester" class="fw-bold"> Semester</label>
                            <select class="form-select" name="semester" aria-label="Select value">
                                <option selected value="">Select</option>
                                <option value="Ganjil"{{ request('semester') === 'Ganjil' ? ' selected' : '' }}>Ganjil</option>
                                <option value="Genap"{{ request('semester') === 'Genap' ? ' selected' : '' }}>Genap</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="jenis_surat" class="fw-bold"> Jenis Surat</label>
                            <select class="form-select" name="jenis_surat" aria-label="Select value">
                                <option selected value="">Select</option>
                                <option value="Surat Permohonan"{{ request('jenis_surat') === 'Surat Permohonan' ? ' selected' : '' }}>Surat Permohonan</option>
                                <option value="Surat Keterangan"{{ request('jenis_surat') === 'Surat Keterangan' ? ' selected' : '' }}>Surat Keterangan</option>
                                
                            </select> 
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="start_date" class="fw-bold"> Start Tanggal</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" id="star_date" autocomplete="off"> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="end_date" class="fw-bold"> End Tanggal</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" id="end_date" autocomplete="off"> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Filters</button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- Modal Print Filters Surat Keluar--}}

{{-- <div class="modal fade" id="printFilterLaporanSuratKeluar" tabindex="-1" aria-labelledby="searchFilterLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="GET">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="printFilterLabel">Print by Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="start_date" class="fw-bold"> Start Tanggal</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" id="star_date" autocomplete="off"> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="end_date" class="fw-bold"> End Tanggal</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" id="end_date" autocomplete="off"> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
