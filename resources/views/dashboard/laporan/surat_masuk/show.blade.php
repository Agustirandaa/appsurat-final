@extends('dashboard.layouts.main')

@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

<div class="row mt-4">
    <div class="col d-flex justify-content-end ali">
        <a href="{{ request('from') }}" role="button" class="btn btn-primary fw-bolder me-4"> 
            <i class='bi bi-arrow-left'></i> Kembali
        </a>
    </div>
</div>
<div class="content-header mt-4 mb-2 rounded-top">
    <div class="row">
        <div class="col text-white fs">
            <i class='bi bi-envelope-open me-3 fs-4'></i>
            <span>{{ $surat->nomor_surat }}</span>
        </div>
    </div>
</div>
<hr>

<div class="container-fluid">
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Pengirim
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->pengirim }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Sifat Surat
        </div>
        <div class="col bg-sky p-3 sifat-surat">
            {{ $surat->sifat_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Jenis Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->jenis_surat }}
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
            No Surat
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->nomor_surat }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Tanggal Surat
        </div>
        <div class="col bg-sky p-3">
            {{ date('d/m/Y', strtotime($surat->tanggal_surat)) }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Tanggal Diterima
        </div>
        <div class="col bg-sky p-3">
            {{ date('d/m/Y', strtotime($surat->tanggal_diterima)) }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Semester
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->semester }}
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
            Disposisi
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->disposisi }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Catatan Disposisi
        </div>
        <div class="col bg-sky p-3">
            {{ $surat->catatan_disposisi }}
        </div>
    </div>
    
    <div class="row gap-3 mb-2 d-flex align-content-center fs">
        <div class="col-md-3 bg-sky p-3 fw-bold">
            Image
        </div>
        <div class="col bg-sky p-3">
            <img src="{{ asset('suratmasuk-images/'. $surat->image) }}" class="img-fluid" alt="...">
        </div>
    </div>
</div>
@endsection