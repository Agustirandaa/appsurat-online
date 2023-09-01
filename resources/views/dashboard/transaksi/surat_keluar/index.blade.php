@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>Transaksi Surat Keluar</span>
</div>

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="content-header mt-4 rounded-top">
    <div class="row gap-2">
        <div class="col-1">
            <select id="showEntries" class="form-select border-0">
                <option selected value="100">Show All</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col-sm-3">     
            <div class="input-group">     
                <span class="input-group-text border-0 bg-white" id="search"><i class='bx bx-search'></i></span>
                <input type="text" class="form-control border-0" name="search" id="searchInput" placeholder="Search..." aria-label="Search" aria-describedby="search" autocomplete="off">
            </div>  
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="/transaksi/surat-keluar/create" role="button" class="btn btn-light fw-bolder d-flex align-items-center"> Tambah <i class='bx bx-plus-medical ms-1'></i> </a>
            </div>
        </div>
    </div>
</div>


<div class="table-responsive">
    <table class="table text-white border-light" id="dataTable" style="width: 100%;">
        <thead class="header-table">
            <tr>
                <td class="py-3 px-4">No</td>
                <td class="py-3 px-4">JENIS SURAT</td>
                <td class="py-3 px-4">TUJUAN SURAT</td>
                <td class="py-3 px-4">SIFAT SURAT</td>
                <td class="py-3 px-4">NO SURAT</td>
                <td class="py-3 px-4">PERIHAL SURAT</td>
                <td class="py-3 px-4">TANGGAL SURAT</td>
                <td class="py-3 px-4">SEMESTER</td>
                <td class="py-3 px-4">AKSI</td>
            </tr>
        </thead>
        
        <tbody class="body-table">
            @foreach ($surats as $data)
            <tr>
                <td class="py-2 px-4 fw-bold">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $data->jenis_surat }}</td>
                <td class="py-2 px-4">{{ $data->tujuan_surat }}</td>
                <td class="py-2 px-4 sifat-surat">{{ $data->sifat_surat }}</td>
                <td class="py-2 px-4">{{ $data->nomor_surat }}</td>
                <td class="py-2 px-4">{{ $data->perihal_surat }}</td>
                <td class="py-2 px-4">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') }}</td>
                <td class="py-2 px-4">{{ $data->semester }}</td>
                <td class="py-2 px-4">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-menu btn-menu'></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('edit-surat-keluar', ['slug' => $data->slug, 'jenis' => $data->jenis_surat, 'status' => $data->status ]) }}"><i class='btn btn-success bx bx-edit-alt'></i></a></li>
                            
                            <li><button type="button" class="dropdown-item deletedModalSuratKeluar" data-slug="/transaksi/surat-keluar/{{ $data->slug }}" data-nomor="{{ $data->nomor_surat }}">
                                <i class='btn btn-danger bx bx-trash'></i>
                            </button></li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('show-detail-laporan', ['slug' => $data->slug, 'jenis' => $data->jenis_surat, 'status' => $data->status]) }}?from=/transaksi/surat-keluar">
                                    <i class='btn btn-warning bx bx-detail'></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
