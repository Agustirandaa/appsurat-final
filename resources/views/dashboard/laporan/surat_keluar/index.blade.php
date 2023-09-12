@extends('dashboard.layouts.main')

@section('content')

<div class="main-title mb-1">
    <span>{{ $title }}</span>
</div>

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bi bi-envelope-open me-3 fs-5'></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

{{-- Untuk cetak laporan --}}
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bi bi-envelope-open me-3 fs-5'></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="content-header mt-4 rounded-top">
    <div class="row gap-2">
        <div class="col-1" >
            <select id="showEntries" class="form-select border-0" onchange="changePageLength()">
                <option selected value="100">Show All</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#searchFilterLaporanSuratKeluar">
                Filters
            </button>
        </div>
        
        <div class="col d-flex justify-content-end">  
            <div class="col-1">
                <a href="{{ route('printsuratkeluar', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'semester' => request('semester')]) }}" target="_blank" role="button" class="btn btn-light">
                    <i class='bi bi-printer'></i>
                </a>      
            </div>
            <div class="col-lg-3">
                <div class="input-group">     
                    <input type="text" class="form-control border-0" name="search" id="searchInput"  placeholder="Search..." aria-label="Search" aria-describedby="search" autocomplete="off">
                    <span class="input-group-text border-0 bg-white" id="search"><i class='bi bi-search'></i></span>
                </div>
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
                <td class="py-3 px-4">SIFAT</td>
                <td class="py-3 px-4">NO SURAT</td>
                <td class="py-3 px-4">PERIHAL SURAT</td>
                <td class="py-3 px-4">TANGGAL</td>
                <td class="py-3 px-4">STATUS</td>
                <td class="py-3 px-4">SMT</td>
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
                <td class="py-2 px-4 {{ $data->status_check == 'Tidak Disetujui' ? 'text-danger' : ($data->status_check == 'Disetujui' ? 'text-success' : 'text-black') }}">
                    {{ $data->status_check }}
                </td>
                <td class="py-2 px-4">{{ $data->semester }}</td>
                <td class="py-2 px-4">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bi bi-list btn-menu'></i>
                        </button>
                        <ul class="dropdown-menu">
                            
                            @can('is_user')   
                            @if ($data->status_check != "Disetujui")  
                            <li>       
                                <a class="dropdown-item" href="{{ route('edit-laporan-surat-keluar', ['jenis' => $data->jenis_surat, 'slug' => $data->slug]) }}"><i class='btn btn-info bi bi-patch-plus'></i></a>
                            </li>
                            @endif
                            @endcan
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('show-detail-laporan', ['slug' => $data->slug, 'jenis' => $data->jenis_surat, 'status' => $data->status]) }}?from=/laporan/surat-keluar">
                                    <i class='btn btn-warning bi bi-card-list'></i>
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