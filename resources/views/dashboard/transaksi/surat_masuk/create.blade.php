@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <form action="/transaksi/surat-masuk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8 form-group mb-2">
                            <label for="pengirim" class="form-label"> Pengirim</label>
                            <input type="text" name="pengirim" class="form-control mt-2  @error('pengirim')
                            is-invalid
                            @enderror" value="{{ old('pengirim') }}" id="pengirim" aria-describedby="pengirim" autocomplete="off" required>
                            @error('pengirim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="sifat_surat"> Sifat surat</label>
                            <select class="form-select mt-3" name="sifat_surat" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Rahasia">Rahasia</option>
                                <option value="Penting">Penting</option>
                                <option value="Biasa">Biasa</option>
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-8 form-group mb-2">
                            <label for="nomor_surat"> Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control mt-2 @error('nomor_surat')
                            is-invalid
                            @enderror"  value="{{ old('nomor_surat') }}" id="nomor_surat" aria-describedby="nomor_surat" autocomplete="off" required>
                            @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="tanggal_surat"> Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control mt-2 @error('tanggal_surat')
                            is-invalid
                            @enderror"  value="{{ old('tanggal_surat') }}" id="tanggal_surat" aria-describedby="tanggal_surat" required>
                            @error('tanggal_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-4 form-group">
                            <label for="jenis_surat"> Jenis Surat</label>
                            <select class="form-select" name="jenis_surat" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Surat Keterangan">Surat Keterangan</option>
                                <option value="Surat Permohonan">Surat Permohonan</option>
                                <option value="Surat Keputusan">Surat Keputusan</option>
                            </select> 
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="semester"> Semester</label>
                            <select class="form-select" name="semester" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select> 
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="tanggal_diterima"> Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control @error('tanggal_diterima')
                            is-invalid
                            @enderror"  value="{{ old('tanggal_diterima') }}" id="tanggal_diterima" aria-describedby="tanggal_diterima" required>
                            @error('tanggal_diterima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-12 form-group mb-2">
                            <label for="perihal_surat"> Perihal Surat</label>
                            <textarea type="text" name="perihal_surat" class="form-control mt-2 @error('perihal_surat')
                            is-invalid
                            @enderror" id="perihal_surat" aria-describedby="perihal_surat" rows="4" autocomplete="off" required>{{ old('perihal_surat') }}</textarea>
                            @error('perihal_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3 mb-5">
                        <div class="col-sm-12 form-group mb-2 ">
                            <label for="image"> Upload file</label>
                            <img class="img-preview img-fluid mt-2 d-block col-sm-9">
                            <input type="file" name="image" class="form-control mt-2 @error('image')
                            is-invalid
                            @enderror" id="image" aria-describedby="image" required onchange="imagePreview()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <input type="hidden" name="slug" class="form-control mt-2" id="slug" value="{{ old('slug') }}"  aria-describedby="slug" required readonly>
                        </div>
                        <div class="col-sm-6 form-group mb-2 d-flex justify-content-end">
                            <a href="/transaksi/surat-masuk/" role="button" class="btn btn-light fw-bolder me-4 d-flex align-items-center"> <i class='bx bx-left-arrow-alt fs-4'></i> Kembali </a>
                            <button type="submit" class="btn btn-primary fw-bolder d-flex align-items-center"> Tambah 
                                <i class='bx bx-plus fs-4 ms-1'></i>
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>    
    function imagePreview() { 
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')
        
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>

@endsection