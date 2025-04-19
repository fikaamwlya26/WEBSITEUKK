@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Cek apakah ada pesan peringatan -->
    @if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Form untuk Gambar Produk -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form untuk Nama Produk -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Produk</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Produk">
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form untuk Deskripsi Produk -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Produk">
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form untuk Harga Produk -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Produk">
                            @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Form untuk Stok Produk -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" placeholder="Masukkan Stok Produk">
                            @error('stok')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <!-- Tombol Kembali, Simpan dan Reset -->
                        <a href="{{ route('product.index') }}">
                            <button type="button" class="btn btn-md btn-primary me-3">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-md btn-success me-3">Simpan</button>
                        <button type="reset" class="btn btn-md btn-warning">Reset</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
