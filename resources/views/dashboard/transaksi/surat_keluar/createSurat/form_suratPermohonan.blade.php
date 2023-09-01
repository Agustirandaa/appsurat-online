<div class="row selected-surat" id="surat-permohonan" aria-label="surat-keterangan">
    <div class="col-lg-7">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <h3 class="mb-5">Surat Permohonan</h3>
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
                            <input type="text" name="jenis_surat" class="form-control" value="Surat Permohonan" autocomplete="off" readonly> 
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="sifat_surat"> Sifat Surat</label>
                            <select class="form-select mb-2" name="sifat_surat" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Rahasia">Rahasia</option>
                                <option value="Penting">Penting</option>
                                <option value="Biasa">Biasa</option>
                                <option value="-">-</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="status"> Status</label>
                            <select class="form-select" name="status" id="js_status" aria-label="Select value" required>
                                <option selected value="" disabled>- Select Status -</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Dosen">Dosen</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="tujuan_surat"> Tujuan Surat</label>
                            <input type="text" name="tujuan_surat" class="form-control" id="tujuan_surat" aria-describedby="tujuan_surat" autocomplete="off" required> 
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
                            <select class="form-select perihal_surat mb-2" name="perihal_surat" id="perihal_surat" aria-label="Select value" required>
                                <option value="" selected disabled>- Select Perihal -</option>
                                <option class="js_select_mahasiswa" value="">(Mahasiswa)</option>
                                <option class="js_select_dosen" value="Permohonan SK Pembina HMP Prodi Teknologi Informasi">(Dosen) Permohonan SK Pembina HMP Prodi Teknologi Informasi</option>
                                <option class="js_select_dosen" value="Permohonan SK Koordinator KKP Prodi Teknologi Informasi">(Dosen) Permohonan SK Koordinator KKP Prodi Teknologi Informasi</option>
                            </select>
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
                    
                    
                    
                    <div id="formulir" style="display: none">
                        <p class="fw-bold">Yang Bersangkutan</p>
                        
                        <div class="row mb-3">
                            <div class="col-sm-5 form-group">
                                <label for="nama"> Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama"  autocomplete="off" required>
                            </div>
                            <div class="col-sm-5 form-group js_nim" id="js_nim" style="display: none">
                                <label for="nim"> Nim</label>
                                <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" autocomplete="off" required>
                            </div>
                            <div class="col-sm-5 form-group js_nip" id="js_nip" style="display: none">
                                <label for="nip"> Nip</label>
                                <input type="text" name="nip" class="form-control" id="nip" aria-describedby="nip" autocomplete="off" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-5 mb-2 form-group">
                                <label for="program_studi"> Program studi</label>
                                <select class="form-select" name="program_studi" aria-label="Select value" required>
                                    <option value="Teknologi Informasi" selected>Teknologi Informasi</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-5 form-group js_pangkat_gol" id="js_pangkat_gol" style="display: none">
                                <label for="pangkat_gol"> Pangkat / Gol</label>
                                <input type="text" name="pangkat_gol" class="form-control" id="pangkat_gol" aria-describedby="pangkat_gol" autocomplete="off" required>
                            </div>
                            
                            <div class="col-sm-5 form-group js_jabatan" id="js_jabatan" style="display: none">
                                <label for="jabatan"> Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" aria-describedby="jabatan" autocomplete="off" required>
                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col-sm-10 form-group">
                                <label for="body_surat"> Body Surat</label>
                                <textarea type="text" name="body_surat" class="form-control js_body_surat" aria-describedby="body_surat" rows="5" autocomplete="off" required></textarea>      
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row mb-4">       
                        <input type="hidden" name="slug" class="form-control" id="slug" aria-describedby="slug" readonly>
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