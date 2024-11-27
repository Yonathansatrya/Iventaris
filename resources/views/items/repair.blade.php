@extends('layouts.app')

@section('title', 'Perbaikan Barang')
@section('header', 'Perbaikan Barang Rusak')

@section('content')
<form action="{{ route('repair-damage-item.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="item_name">Nama Barang</label>
        <select name="item_name" id="item_name" class="form-select" required>
            @foreach ($damagedItems as $item)
            <option value="{{ $item->id }}">{{ $item->item_name }} - {{ $item->specification }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="information">Keterangan Perbaikan</label>
        <textarea name="information" id="information" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="repair_completion_date">Tanggal Selesai Perbaikan</label>
        <input type="date" name="repair_completion_date" id="repair_completion_date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="name_technician">Nama Teknisi</label>
        <input type="text" name="name_technician" id="name_technician" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
