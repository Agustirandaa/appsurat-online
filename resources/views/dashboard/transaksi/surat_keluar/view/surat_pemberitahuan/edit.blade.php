@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <h3 class="mb-5">Edit surat Pemberitahuan</h3>
                <form action="/transaksi/surat-keluar/{{ $surat->slug }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-sm-12 form-group">
                            <label for="nomor_surat"> Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="{{ $surat->nomor_surat }}" id="nomor_surat" aria-describedby="nomor_surat" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-2 form-group">
                            <label for="jenis_surat"> Jenis Surat</label>
                            <input type="text" name="jenis_surat" class="form-control" value="{{ $surat->jenis_surat }}" id="jenis_surat" aria-describedby="jenis_surat" autocomplete="off" required readonly> 
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="sifat_surat"> Sifat Surat</label>
                            <input type="text" name="sifat_surat" class="form-control" value="{{ $surat->sifat_surat }}" id="sifat_surat" aria-describedby="sifat_surat" autocomplete="off" required readonly>
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="status"> Status</label>
                            <input type="text" name="status" class="form-control" value="{{ $surat->status }}" id="status" aria-describedby="status" autocomplete="off" required readonly> 
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="tujuan_surat"> Tujuan Surat</label>
                            <input type="text" name="tujuan_surat" class="form-control" value="{{ $surat->tujuan_surat }}" id="tujuan_surat" aria-describedby="tujuan_surat" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="tanggal_surat"> Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control" value="{{ $surat->tanggal_surat }}" id="tanggal_surat" aria-describedby="tanggal_surat" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="semester"> Semester</label>
                            <select class="form-select mb-2" name="semester" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Ganjil" @if ($surat->semester == 'Ganjil') selected @endif>Ganjil</option>
                                <option value="Genap" @if ($surat->semester == 'Genap') selected @endif>Genap</option>   
                            </select> 
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-sm-8 form-group">
                            <label for="perihal_surat"> Perihal Surat</label>
                            <input type="text" name="perihal_surat" class="form-control" value="{{ $surat->perihal_surat }}" id="perihal_surat" aria-describedby="perihal_surat" autocomplete="off" required> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="lampiran"> Lampiran</label>
                            <select class="form-select lampiran mb-2" name="lampiran" id="lampiran" aria-label="Select value" required>
                                <option value="" selected disabled>- Select Perihal -</option>
                                <option value="-" @if ($surat->lampiran == '-') selected @endif>-</option>
                                <option value="1 (satu) Lembar" @if ($surat->lampiran == '1 (satu) Lembar') selected @endif>1 (satu) Lembar</option>
                                <option value="2 (dua) Lembar" @if ($surat->lampiran == '2 (dua) Lembar') selected @endif>2 (dua) Lembar</option>
                                <option value="3 (tiga) Lembar" @if ($surat->lampiran == '3 (tiga) Lembar') selected @endif>2 (dua) Lembar</option>
                                
                            </select>
                        </div>
                    </div>
                    <p class="fw-bold">Field pemberitahuan</p>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="nama"> Surat Pemberitahuan ?</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $surat->suratpemberitahuan->nama }}" aria-describedby="nama"  autocomplete="off" required>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="hari_tanggal"> Hari / Tanggal</label>
                            <input type="text" name="hari_tanggal" class="form-control" value="{{ $surat->suratpemberitahuan->hari_tanggal }}" id="hari_tanggal" aria-describedby="hari_tanggal" autocomplete="off"> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="pukul"> Pukul</label>
                            <input type="text" name="pukul" class="form-control" value="{{ $surat->suratpemberitahuan->pukul }}" id="pukul" aria-describedby="pukul" autocomplete="off"> 
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 form-group">
                            <label for="tempat"> Tempat</label>
                            <input type="text" name="tempat" class="form-control" value="{{ $surat->suratpemberitahuan->tempat }}" id="tempat" aria-describedby="tempat" autocomplete="off"> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="acara"> Acara</label>
                            <input type="text" name="acara" class="form-control" value="{{ $surat->suratpemberitahuan->acara }}" id="acara" aria-describedby="acara" autocomplete="off"> 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="peserta"> Peserta</label>
                            <input type="text" name="peserta" class="form-control" value="{{ $surat->suratpemberitahuan->peserta }}" id="peserta" aria-describedby="peserta" autocomplete="off"> 
                        </div>
                    </div>
                    
                    
                    
                    <div class="row mb-5">
                        <div class="col-sm-10 form-group">
                            <label for="body_surat"> Body Surat</label>
                            <textarea type="text" name="body_surat" class="form-control" aria-describedby="body_surat" rows="5" autocomplete="off" required>{{ $surat->suratpemberitahuan->body_surat }}</textarea>      
                        </div>
                    </div>          
                    
                    <div class="row mb-4">       
                        <input type="text" name="slug" value="{{ $surat->slug }}" class="form-control" id="slug" aria-describedby="slug" readonly>      
                        <div class="col form-group mb-3 d-flex justify-content-start">
                            <a href="/transaksi/surat-keluar" role="button" class="btn btn-light fw-bolder d-flex align-items-center">
                                <i class='bx bx-left-arrow-alt me-1 fs-5'></i> Kembali 
                            </a>
                        </div>
                        <div class="col form-group mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary d-flex align-items-center fw-bolder"> Update 
                                <i class='bx bx-refresh fs-4 ms-1'></i>
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection