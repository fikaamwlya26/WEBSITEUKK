@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Cek apakah ada pesan peringatan -->
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
    <!-- Search Bar -->
    <form class="d-flex align-items-center" style="background: white; padding: 5px 10px; border-radius: 8px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
        <div class="input-group" style="width: 250px;">
            <input type="text" id="searchInput" class="form-control small"
                style="border: none; background: transparent;" placeholder="Cari produk..."
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Tombol Tambah dan Print -->
    <div class="d-flex gap-2">
        <a href="{{ route('product.create') }}" class="btn btn-md btn-primary">Tambah Produk</a>
        <a href="{{ route('product.index', ['print' => 'true']) }}" target="_blank" class="btn btn-md btn-secondary ms-auto">
            <i class="fas fa-print"></i> Print
        </a>
    </div>
</div>



    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="productTable">
    <thead class="bg-primary text-white">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $index => $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="gambar" width="50">
                </td>
                <td class="nama-product">{{ $product->nama }}</td>
                <td class="deskripsi-product">{{ $product->deskripsi }}</td>
                <td class="harga-product">{{ number_format($product->harga, 2) }}</td>
                <td class="stok-product">{{ $product->stok }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                        action="{{ route('product.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-dark">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data produk</td>
            </tr>
        @endforelse
    </tbody>
</table>

            
        </div>
    </div>
</div>

<!-- Script JavaScript untuk Pencarian -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(row => {
        let nama = row.querySelector(".nama-product").textContent.toLowerCase();
        let deskripsi = row.querySelector(".deskripsi-product").textContent.toLowerCase();
        let harga = row.querySelector(".harga-product").textContent.toLowerCase();
        let stok = row.querySelector(".stok-product").textContent.toLowerCase();

        if (nama.includes(filter) || deskripsi.includes(filter) || harga.includes(filter) || stok.includes(filter)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
</script>

@endsection
