@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>
<div class="row mt-4">
    <div class="col d-flex justify-content-end">
        <a href="{{ request('from') }}" role="button" class="btn btn-primary fw-bolder"> 
            <i class='bi bi-arrow-left'></i> Kembali
        </a>  
    </div>
</div>

<div class="content-header mt-4 mb-2 rounded-top">
    <div class="row">
        <div class="col text-white d-flex align-items-center fs">
            <i class='bi bi-envelope-open me-3 fs-4'></i>
            <span>{{ $surat->nomor_surat }}</span>
        </div>
    </div>
</div>
<hr>

<div class="container-fluid">
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Persetujuan Surat
        </div>    
        <div class="col bg-sky p-3 {{ $surat->status_check == 'Tidak Disetujui' ? 'text-danger' : ($surat->status_check == 'Disetujui' ? 'text-success' : 'text-black') }}">
            Surat {{ $surat->status_check }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold ">
            Tanggal Submit Pengecekan
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->tanggal_check }}
        </div>
    </div>
    
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold ">
            Catatan Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->catatan }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold ">
            Jenis Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->jenis_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Tujuan Surat
        </div>
        <div class="col bg-sky p-3 ">
            {{ $surat->tujuan_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Sifat Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->sifat_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Status
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->status }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Perihal Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->perihal_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Lampiran
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->lampiran }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Tanggal Surat
        </div>
        <div class="col bg-sky p-3">
            {{ date('d M Y', strtotime($surat->tanggal_surat)) }}
        </div>
    </div>
    
    <div class="row gap-3 mb-5 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Semester
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->semester }}
        </div>
    </div>
    
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Nama Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->nama }}
        </div>
    </div>
    
    
    
    @if ($surat->suratpemberitahuan->hari_tanggal !== null)
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Hari / Tanggal
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->hari_tanggal }}
        </div>
    </div>
    @endif
    
    
    @if ($surat->suratpemberitahuan->pukul !== null)
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Pukul
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->pukul }}
        </div>
    </div>
    @endif
    
    
    @if ($surat->suratpemberitahuan->tempat !== null)
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Tempat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->tempat }}
        </div>
    </div>
    @endif
    
    @if ($surat->suratpemberitahuan->acara !== null)
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Acara
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->acara }}
        </div>
    </div>
    @endif
    
    @if ($surat->suratpemberitahuan->peserta !== null)
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Peserta
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->suratpemberitahuan->peserta }}
        </div>
    </div>
    @endif
    
    
    <div class="row gap-3 mb-5 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            View Surat
        </div>
        <div class="col-md-1 p-3">
            <a href="{{ route('viewpdf', ['slug' => $surat->slug, 'jenis' => $surat->jenis_surat, 'status' => $surat->status]) }}" target="_blank" role="button" class="btn btn-primary fw-bolder"> 
                <i class='bi bi-eye'></i> View 
            </a>
        </div>
    </div>
    
</div>
@endsection
