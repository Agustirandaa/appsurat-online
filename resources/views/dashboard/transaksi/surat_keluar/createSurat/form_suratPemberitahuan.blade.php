<div class="row selected-surat" id="surat-pemberitahuan" aria-label="surat-pemberitahuan">
    <div class="col-lg-7">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <h3 class="mb-5">Surat Pemberitahuan</h3>
                <form action="/transaksi/surat-keluar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12 form-group">
                            <label for="nomor_surat"> Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="{{ $nextNomorSurat }}" id="nomor_surat" aria-describedby="nomor_surat" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-2 form-group">
                            <label for="jenis_surat"> Jenis Surat</label>
                            <input type="text" name="jenis_surat" class="form-control" value="Surat Pemberitahuan" autocomplete="off" readonly> 
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="sifat_surat"> Sifat Surat</label>
                            <input type="text" name="sifat_surat" class="form-control" value="-" aria-describedby="sifat_surat" autocomplete="off" readonly required>
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="status"> Status</label>
                            <input type="text" name="status" class="form-control" value="-" id="status" aria-describedby="status" autocomplete="off" readonly required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="tujuan_surat"> Tujuan Surat</label>
                            <input type="text" name="tujuan_surat" class="form-control" value="-" id="tujuan_surat" aria-describedby="tujuan_surat" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="tanggal_surat"> Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" aria-describedby="tanggal_surat" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="semester"> Semester</label>
                            <select class="form-select mb-2" name="semester" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-sm-8 form-group">
                            <label for="perihal_surat"> Perihal Surat</label>
                            <input type="text" name="perihal_surat" class="form-control" id="perihal_surat" aria-describedby="perihal_surat" required autocomplete="off">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="lampiran"> Lampiran</label>
                            <select class="form-select lampiran mb-2" name="lampiran" id="lampiran" aria-label="Select value" required>
                                <option value="" selected disabled>- Select Perihal -</option>
                                <option value="-" selected>-</option>
                                <option value="1 (satu) Lembar">1 (satu) Lembar</option>
                                <option value="2 (dua) Lembar">2 (dua) Lembar</option>
                                <option value="3 (tiga) Lembar">3 (tiga) Lembar</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <p class="fw-bold">Field pemberitahuan</p>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="nama"> Surat Pemberitahuan ?</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="Surat Pemberitahuan ?"  autocomplete="off" required>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="hari_tanggal"> Hari / Tanggal</label>
                            <input type="text" name="hari_tanggal" class="form-control" id="hari_tanggal" aria-describedby="hari_tanggal" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="pukul"> Pukul</label>
                            <input type="text" name="pukul" class="form-control" id="pukul" aria-describedby="pukul" autocomplete="off" required> 
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="tempat"> Tempat</label>
                            <input type="text" name="tempat" class="form-control" id="tempat" aria-describedby="tempat" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="acara"> Acara</label>
                            <input type="text" name="acara" class="form-control" id="acara" aria-describedby="acara" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="peserta"> Peserta</label>
                            <input type="text" name="peserta" class="form-control" id="peserta" aria-describedby="peserta" autocomplete="off" required> 
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="row mb-5">
                            <div class="col-sm-12 form-group">
                                <label for="body_surat"> Body Surat</label>
                                <textarea type="text" name="body_surat" class="form-control js_body_surat" aria-describedby="body_surat" rows="5" autocomplete="off" required>Ketua Program Studi Teknologi Informasi Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh dengan ini mengundang Bapak dan Ibu Dosen Prodi Teknologi Informasi serta seluruh mahasiswa/I Prodi Teknologi Informasi agar dapat bergabung pada :</textarea>      
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">       
                        <input type="text" name="slug" class="form-control" id="slug" aria-describedby="slug" readonly>
                        <div class="col form-group mb-3 d-flex justify-content-start">
                            <a href="/transaksi/surat-keluar" role="button" class="btn btn-light fw-bolder d-flex align-items-center">
                                <i class='bx bx-left-arrow-alt me-1 fs-5'></i> Kembali 
                            </a>
                        </div>
                        <div class="col form-group mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary d-flex align-items-center fw-bolder"> Tambah 
                                <i class='bx bx-plus fs-5 ms-1'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>