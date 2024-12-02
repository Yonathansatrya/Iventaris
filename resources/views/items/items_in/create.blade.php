@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/Item/in/create.css') }}">

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Barang Baru</h1>
    <form action="{{ route('items_in.store') }}" method="POST" class="form-container">
        @csrf
        <div class="form-group">
            <label for="item_name" class="form-label">Nama Item</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type_item" class="form-label">Tipe</label>
            <select name="type_item" id="type_item" class="form-control" required>
                <option value="" disabled selected>Pilih Tipe</option>
                <option value="inventaris">Inventaris</option>
                <option value="bahan">Bahan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="specification" class="form-label">Spesifikasi</label>
            <textarea name="specification" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="procurement_sources" class="form-label">Sumber Pengadaan</label>
            <input type="text" name="procurement_sources" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_item" class="form-label">Jumlah Item</label>
            <input type="number" name="total_item" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="condition" class="form-label">Kondisi</label>
            <select name="condition" class="form-control" required>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('items_in.inventaris', ['type' => 'inventaris']) }}" class="btn btn-primary btn-block">
            <i class="fas fa-undo"></i> Kembali ke Inventaris
        </a>
        <a href="{{ route('items_in.bahan', ['type' => 'bahan']) }}" class="btn btn-secondary btn-block">
            <i class="fas fa-undo"></i> Kembali ke Bahan
        </a>
    </form>
</div>
@endsection
