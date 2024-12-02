@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Perbaikan Item</h1>

    <div class="mb-3">
        <strong>Item Rusak:</strong> {{ $repairItem->damagedItem->item->name }}
    </div>
    <div class="mb-3">
        <strong>Jumlah Perbaikan:</strong> {{ $repairItem->repair_quantity }}
    </div>
    <div class="mb-3">
        <strong>Tanggal Perbaikan:</strong> {{ $repairItem->repair_date }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi Perbaikan:</strong> {{ $repairItem->repair_description }}
    </div>

    <a href="{{ route('repair-damaged-items.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
</div>
@endsection
