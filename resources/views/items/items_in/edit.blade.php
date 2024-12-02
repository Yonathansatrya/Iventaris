@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/Item/in/edit.css') }}">
@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('items_in.update', $item->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="item_name" class="form-label">Nama Barang</label>
            <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}" required>
        </div>
        <div class="form-group">
            <label for="specification" class="form-label">Spesifikasi</label>
            <textarea name="specification" class="form-control" rows="3" required>{{ $item->specification }}</textarea>
        </div>
        <div class="form-group">
            <label for="procurement_sources" class="form-label">Sumber Pengadaan</label>
            <input type="text" name="procurement_sources" class="form-control" value="{{ $item->procurement_sources }}" required>
        </div>
        <div class="form-group">
            <label for="total_item" class="form-label">Jumlah Barang</label>
            <input type="number" name="total_item" class="form-control" value="{{ $item->total_item }}" required>
        </div>
        <div class="form-group">
            <label for="condition" class="form-label">Kondisi</label>
            <select name="condition" class="form-control" required>
                <option value="Baik" {{ $item->condition == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ $item->condition == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type_item" class="form-label">Tipe</label>
            <select name="type_item" id="type_item" class="form-control" required>
                <option value="inventaris" {{ $item->type_item == 'inventaris' ? 'selected' : '' }}>Inventaris</option>
                <option value="bahan" {{ $item->type_item == 'bahan' ? 'selected' : '' }}>Bahan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>
</div>
@endsection
