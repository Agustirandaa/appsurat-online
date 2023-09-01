@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>


<div class="row mt-4">
    <div class="col d-flex justify-content-end">
        <a href="/laporan/surat-keluar" role="button" class="btn btn-primary fw-bolder d-flex align-items-center me-4"> 
            <i class='bx bx-left-arrow-alt fs-5'></i> Kembali
        </a>
    </div>
</div>

<div class="content-header mt-4 mb-2 rounded-top">
    <div class="row">
        <div class="col text-white d-flex align-items-center fs">
            <i class='bx bx-envelope-open me-3 fs-4'></i>
            <span>Detail surat keluar : </span>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-6">
        <div class="card mt-4 card-input">
            <div class="card-body">
                <form action="/laporan/surat-keluar/{{ $surat->slug }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" value="{{ $surat->id }}" name="surat_keluar_id" id="surat_keluar_id">
                        <input type="hidden" name="tanggal_check" id="tanggal_check">
                        <input type="hidden" name="name_check" value="{{ auth()->user()->name }}">
                        
                        <div class="col-sm-2 form-group mb-2">
                            <label for="" class="form-label">View Surat</label>
                            <a href="{{ route('viewpdf', ['slug' => $surat->slug,'jenis' => $surat->jenis_surat, 'status' => $surat->status ])}}" target="_blank" role="button" class="btn btn-primary fw-bolder d-flex align-items-center me-3"> 
                                <i class='bx bx-show-alt fs-5 d-flex align-items-center me-1'></i> View 
                            </a>
                        </div>  
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-9 form-group mb-2">
                            <label for="status_check" class="form-label"> Status</label>
                            <select class="form-select" name="status_check" aria-label="Select value" required>
                                <option selected disabled value="">Select</option>
                                <option value="Disetujui">Setujui</option>
                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-sm-9 form-group mb-2">
                            <label for="catatan" class="form-label"> Catatan</label>
                            <textarea type="text" name="catatan" class="form-control " id="catatan" aria-describedby="catatan" rows="3" autocomplete="off" required></textarea>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col form-group mb-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary fw-bolder d-flex align-items-center"> Submit</button>
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
    // Mendapatkan tanggal saat ini dalam format hari-bulan-tanggal
    const currentDate = new Date();
    const day = String(currentDate.getDate()).padStart(2, '0');
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const year = currentDate.getFullYear();
    const formattedDate = `${day}-${month}-${year}`;
    
    // Mengatur nilai default input tanggal
    document.getElementById('tanggal_check').value = formattedDate;
</script>


@endsection