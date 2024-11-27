@extends('layouts.app')

@section('title', 'Edit Barang')
@section('header', 'Edit Barang')

@section('content')
<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="item_name" value="{{ $item->item_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Spesifikasi</label>
        <input type="text" name="specification" value="{{ $item->specification }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Sumber Pengadaan</label>
        <input type="text" name="procurement_sources" value="{{ $item->procurement_sources }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah Barang</label>
        <input type="number" name="total_item" value="{{ $item->total_item }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kondisi</label>
        <input type="text" name="condition" value="{{ $item->condition }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tipe Barang</label>
        <select name="type_item" class="form-select">
            <option value="Inventaris" {{ $item->type_item == 'Inventaris' ? 'selected' : '' }}>Inventaris</option>
            <option value="Bahan" {{ $item->type_item == 'Bahan' ? 'selected' : '' }}>Bahan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form
