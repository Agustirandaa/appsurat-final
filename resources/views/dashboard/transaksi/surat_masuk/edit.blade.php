    @extends('dashboard.layouts.main')
    
    @section('content')
    
    <div class="main-title">
        <span>{{ $title }}</span>
    </div>
    
    <div class="row">
        <div class="col-lg-7">
            <div class="card mt-4 card-input">
                <div class="card-body">
                    <form action="/transaksi/surat-masuk/{{ $surat->slug }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 form-group mb-2">
                                <label for="pengirim" class="form-label"> Pengirim</label>
                                <input type="text" name="pengirim" class="form-control mt-2  @error('pengirim')
                                is-invalid
                                @enderror" value="{{ old('pengirim', $surat->pengirim) }}" id="pengirim" aria-describedby="pengirim" autocomplete="off" required>
                                @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                                @enderror
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="sifat_surat"> Sifat surat</label>
                                <select class="form-select mt-3" name="sifat_surat" aria-label="Select value" required>
                                    <option disabled value="">Select sifat surat</option>
                                    <option value="Rahasia" @if($surat->sifat_surat === 'Rahasia') selected @endif>Rahasia</option>
                                    <option value="Penting" @if($surat->sifat_surat === 'Penting') selected @endif>Penting</option>
                                    <option value="Biasa" @if($surat->sifat_surat === 'Biasa') selected @endif>Biasa</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-sm-8 form-group mb-2">
                                <label for="nomor_surat"> Nomor Surat</label>
                                <input type="text" name="nomor_surat" class="form-control mt-2 @error('nomor_surat')
                                is-invalid
                                @enderror"  value="{{ old('nomor_surat', $surat->nomor_surat) }}" id="nomor_surat" aria-describedby="nomor_surat" autocomplete="off" required>
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
                                @enderror"  value="{{ old('tanggal_surat', $surat->tanggal_surat) }}" id="tanggal_surat" aria-describedby="tanggal_surat" required>
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
                                <select class="form-select mt-2" name="jenis_surat" aria-label="Select value" required>
                                    <option disabled value="">Select sifat surat</option>
                                    <option value="Surat Keterangan" @if($surat->jenis_surat === 'Surat Keterangan') selected @endif>Surat Keterangan</option>
                                    <option value="Surat Permohonan" @if($surat->jenis_surat === 'Surat Permohonan') selected @endif>Surat Permohonan</option>
                                    <option value="Surat Pemberitahuan" @if($surat->jenis_surat === 'Surat Pemberitahuan') selected @endif>Surat Pemberitahuan</option>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="semester"> Semester</label>
                                <select class="form-select mt-2" name="semester" aria-label="Select value" required>
                                    <option disabled value="">Select sifat surat</option>
                                    <option value="Ganjil" @if($surat->semester === 'Ganjil') selected @endif>Ganjil</option>
                                    <option value="Genap" @if($surat->semester === 'Genap') selected @endif>Genap</option>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="tanggal_diterima"> Tanggal Diterima</label>
                                <input type="date" name="tanggal_diterima" class="form-control mt-2 @error('tanggal_diterima')
                                is-invalid
                                @enderror"  value="{{ old('tanggal_diterima', $surat->tanggal_diterima) }}" id="tanggal_diterima" aria-describedby="tanggal_diterima" required>
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
                                @enderror" value="{{ old('perihal_surat') }}" id="perihal_surat" aria-describedby="perihal_surat" rows="5" autocomplete="off" required>{{ $surat->perihal_surat }}</textarea>
                                @error('perihal_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-sm-12 form-group mb-2 ">
                                <label for="image"> Upload file</label>
                                <input type="hidden" name="oldImage" value="{{ $surat->image }}">
                                @if ( $surat->image )
                                <img src="{{ asset('suratmasuk-images/'.$surat->image) }}" class="img-preview img-fluid mb-3 mt-3 d-block col-sm-9">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" name="image" class="form-control mt-2" id="image" aria-describedby="image" onchange="previewImage()">     
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <input type="text" name="slug" class="form-control mt-2 @error('slug')
                                is-invalid
                                @enderror" id="slug" aria-describedby="slug" value="{{ old('slug', $surat->slug) }}" required readonly>
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group mb-2 d-flex justify-content-end">
                                <a href="/transaksi/surat-masuk/" role="button" class="btn btn-light fw-bolder me-4"> 
                                    <i class='bi bi-arrow-left'></i> Kembali 
                                </a>
                                <button type="submit" class="btn btn-primary d-flex align-items-center fw-bolder"> Update 
                                    <i class='bi bi-arrow-repeat ms-1'></i>
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
        function previewImage() { 
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }  
    </script>
    
    @endsection