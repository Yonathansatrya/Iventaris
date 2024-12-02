@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Penggunaan Item</h1>

    <div class="mb-3">
        <strong>Item:</strong> {{ $itemUse->item->name }}
    </div>
    <div class="mb-3">
        <strong>Jumlah:</strong> {{ $itemUse->quantity }}
    </div>
    <div class="mb-3">
        <strong>Pengguna:</strong> {{ $itemUse->user->name }}
    </div>
    <div class="mb-3">
        <strong>Tanggal Penggunaan:</strong> {{ $itemUse->use_date }}
    </div>

    <a href="{{ route('item_use.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
</div>
@endsection
