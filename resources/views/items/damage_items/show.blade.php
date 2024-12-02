@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Item Rusak</h1>

    <div class="mb-3">
        <strong>Item:</strong> {{ $damagedItem->item->name }}
    </div>
    <div class="mb-3">
        <strong>Jumlah Kerusakan:</strong> {{ $damagedItem->quantity }}
    </div>
    <div class="mb-3">
        <strong>Tanggal Kerusakan:</strong> {{ $damagedItem->damage_date }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi Kerusakan:</strong> {{ $damagedItem->damage_description }}
    </div>

    <a href="{{ route('damaged-items.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
</div>
@endsection
