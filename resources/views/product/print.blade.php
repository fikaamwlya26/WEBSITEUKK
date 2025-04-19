@extends('layouts.app')

@section('title', 'Cetak Produk')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Produk</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/product/' . $product->image) }}" width="70">
                    </td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>Rp{{ number_format($product->harga, 2, ',', '.') }}</td>
                    <td>{{ $product->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">BACK</a>
    <button onclick="window.print()" class="btn btn-primary mt-3">
        <i class="fas fa-print"></i> Cetak
    </button>
</div>
@endsection
