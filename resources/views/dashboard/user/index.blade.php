@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>Pengaturan Role</span>
</div>

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif


<div class="row my-4">
    <div class="col-1 d-flex justify-content-center">
        <a href="/dashboard/pengaturan/create" role="button" class="btn btn-primary fw-bolder d-flex align-items-center"> Tambah <i class='bx bx-plus-medical ms-1'></i> </a>
    </div>
</div>


<div class="table-responsive">
    <table class="table text-white border-light"style="width: 60%;">
        <thead class="header-table">
            <tr>
                <td class="py-3 px-4">No</td>
                <td class="py-3 px-4">NAMA</td>
                <td class="py-3 px-4">EMAIL</td>
                <td class="py-3 px-4">NIP</td>
                <td class="py-3 px-4">LEVEL</td>
                <td class="py-3 px-4 text-center">AKSI</td>
            </tr>
        </thead>
        
        <tbody class="body-table">
            @foreach ($users->skip(1) as $data)
            <tr>
                <td class="py-2 px-4 fw-bold">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $data->name }}</td>
                <td class="py-2 px-4">{{ $data->email }}</td>
                <td class="py-2 px-4">{{ $data->nip }}</td>
                <td class="py-2 px-4">
                    @if($data->level == 'is_admin')
                    Admin
                    @else
                    User
                    @endif
                </td>
                
                <td class="py-2 px-4 text-center">
                    <a href="/dashboard/pengaturan/{{ $data->id }}/edit" role="button" class="btn btn-light btn-sm">Ubah</a>
                    <button type="button" class="btn btn-primary btn-sm deletedModalUser" data-id="/dashboard/pengaturan/{{ $data->id }}" data-name="{{ $data->name }}">
                        Hapus
                    </button>
                </div>  
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
