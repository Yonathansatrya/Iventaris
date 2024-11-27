@extends('layouts.app')

@section('title', 'Tambah Barang')
@section('header', 'Tambah Barang Baru')

@section('content')
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="item_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Spesifikasi</label>
        <input type="text" name="specification" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Sumber Pengadaan</label>
        <input type="text" name="procurement_sources" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah Barang</label>
        <input type="number" name="total_item" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kondisi</label>
        <input type="text" name="condition" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tipe Barang</label>
        <select name="type_item" class="form-select">
            <option value="Inventaris">Inventaris</option>
            <option value="Bahan">Bahan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
