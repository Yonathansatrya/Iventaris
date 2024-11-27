@extends('layouts.app')

@section('title', 'Penggunaan Barang')
@section('header', 'Penggunaan Barang')

@section('content')
<form action="{{ route('item-use.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="item_id">Nama Barang</label>
        <select name="item_id" id="item_id" class="form-select" required>
            @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->item_name }} - {{ $item->specification }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="total_use">Jumlah Penggunaan</label>
        <input type="number" name="total_use" id="total_use" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
