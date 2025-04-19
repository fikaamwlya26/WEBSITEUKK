@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('title', 'Detail Produk')

@section('content')
<div class="container-fluid">
    <!-- Card Detail Produk -->
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/product/' . $product->image) }}" class="rounded img-fluid" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $product->nama }}</h3>
                    <hr/>
                    <p><strong>Deskripsi:</strong> {{ $product->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($product->harga, 2, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $product->stok }}</p>
                    <hr/>
                    <a href="{{ route('product.index') }}" class="btn btn-md btn-primary me-3">BACK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
