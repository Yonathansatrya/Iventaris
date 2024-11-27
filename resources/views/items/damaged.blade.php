@extends('layouts.app')

@section('title', 'Barang Rusak')
@section('header', 'Data Barang Rusak')

@section('content')
<form action="{{ route('damage-item.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="item_name">Nama Barang</label>
        <select name="item_name" id="item_name" class="form-select" required>
            @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="date_damage">Tanggal Kerusakan</label>
        <input type="date" name="date_damage" id="date_damage" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="specification">Spesifikasi</label>
        <textarea name="specification" id="specification" rows="2" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="total_item">Jumlah Barang Rusak</label>
        <input type="number" name="total_item" id="total_item" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="type_item">Tipe Barang</label>
        <select name="type_item" id="type_item" class="form-select" required>
            <option value="Inventaris">Inventaris</option>
            <option value="Bahan">Bahan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
