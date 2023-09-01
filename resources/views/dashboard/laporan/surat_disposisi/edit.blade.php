@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <form action="/laporan/surat-masuk/{{ $surat->slug }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="surat_masuk_id" class="form-control mt-2" value="{{ $surat->id }}" id="surat_masuk_id" aria-describedby="surat_masuk_id" autocomplete="off" required>   
                    <div class="row">
                        <label class="fw-bold fs-5" for="catata_disposisi"> Isi disposisi</label>
                        <div class="col d-flex flex-column mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="options[]" type="checkbox" id="pertimbangan" value="Pertimbangan">
                                <label class="form-check-label" for="pertimbangan">Pertimbangan</label>
                            </div>
                            <div class="form-check form-check-inline mt-2  mt-2">
                                <input class="form-check-input" name="options[]" type="checkbox" id="pendapat_saran" value="Pendapat saran">
                                <label class="form-check-label" for="pendapat_saran">Pendapat saran</label>
                            </div>
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="persetujuan_keputusan" value="Persetujuan Keputusan">
                                <label class="form-check-label" for="persetujuan_keputusan">Persetujuan Keputusan</label>
                            </div>    
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="Petunjuk" value="Petunjuk">
                                <label class="form-check-label" for="Petunjuk">Petunjuk</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="catatatn" value="Catatan">
                                <label class="form-check-label" for="catatatn">Catatatn</label>
                            </div>      
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="bicarakan" value="Bicarakan">
                                <label class="form-check-label" for="bicarakan">Bicarakan</label>
                            </div>                   
                        </div>
                        
                        <div class="col d-flex flex-column mt-3"> 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="perhatian" value="Perhatian">
                                <label class="form-check-label" for="perhatian">Perhatian</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="siapkan_konsep" value="Siapkan konsep">
                                <label class="form-check-label" for="siapkan_konsep">Siapkan Konsep</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="siapkan_laporan" value="Siapkan laporan">
                                <label class="form-check-label" for="siapkan_laporan">Siapkan Laporan</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="diproses" value="Diproses">
                                <label class="form-check-label" for="diproses">Diproses</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="edarkan" value="Edarkan">
                                <label class="form-check-label" for="edarkan">Edarkan</label>
                            </div>  
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="pengetahuan" value="Pengetahuan">
                                <label class="form-check-label" for="pengetahuan">Pengetahuan</label>
                            </div>  
                        </div>
                        
                        <div class="col d-flex flex-column mt-3" > 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="dikoreksi" value="Dikoreksi">
                                <label class="form-check-label" for="dikoreksi">Dikoreksi</label>
                            </div> 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="dilaksanakan" value="Dilaksanakan">
                                <label class="form-check-label" for="dilaksanakan">Dilaksanakan</label>
                            </div> 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="diselesaikan" value="Diselesaikan">
                                <label class="form-check-label" for="diselesaikan">Diselesaikan</label>
                            </div> 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="file_arsip" value="File / Arsip">
                                <label class="form-check-label" for="file_arsip">File / Arsip</label>
                            </div> 
                            <div class="form-check form-check-inline mt-2" >
                                <input class="form-check-input" name="options[]" type="checkbox" id="lainnya" value="lainnya">
                                <label class="form-check-label" for="lainnya">Lainnya</label>
                            </div> 
                        </div>
                        
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col form-group mb-2">
                            <label class="fs-5" for="catatan_disposisi"> Catatan disposisi</label>
                            <textarea type="text" name="catatan_disposisi" class="form-control mt-2 @error('catatan_disposisi')
                            is-invalid
                            @enderror" id="catatan_disposisi" aria-describedby="catatan_disposisi" rows="5" autocomplete="off" required>{{ old('catatan_disposisi') }}</textarea>
                            @error('catatan_disposisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        {{-- <div class="col">
                            <input type="text" name="slug" class="form-control mt-2" id="slug" value="{{ old('slug') }}"  aria-describedby="slug" required readonly>
                        </div> --}}
                        <div class="col form-group mb-2 d-flex justify-content-end">
                            <a href="/laporan/surat-masuk/" role="button" class="btn btn-light fw-bolder me-4 d-flex align-items-center"> <i class='bx bx-left-arrow-alt fs-4'></i> Kembali </a>
                            <button type="submit" class="btn btn-primary fw-bolder d-flex align-items-center"> Disposisi 
                                {{-- <i class='bx bx-plus fs-4 ms-1'></i> --}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection