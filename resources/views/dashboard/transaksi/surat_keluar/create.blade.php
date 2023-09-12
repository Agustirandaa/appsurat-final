@extends('dashboard.layouts.main')


@section('content')

<div class="main-title">
    <span>{{ $title }}</span>
</div>

@if (session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
    <i class='bx bx-envelope-open me-3 fs-4'></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif

<div class="row mt-4 mb-4">
    <div class="col-md-3">
        <select class="form-select" id="select-surat">
            <option selected>Pilih Jenis Surat !</option>
            <option value="surat-keterangan">Surat Keterangan</option>
            <option value="surat-permohonan">Surat Permohonan</option>
            <option value="surat-pemberitahuan">Surat Pemberitahuan</option>
        </select>
    </div>
</div>

@include('dashboard.transaksi.surat_keluar.createSurat.form_suratPermohonan')
@include('dashboard.transaksi.surat_keluar.createSurat.form_suratKeterangan')
@include('dashboard.transaksi.surat_keluar.createSurat.form_suratPemberitahuan')

@endsection