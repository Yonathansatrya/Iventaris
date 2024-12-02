@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/Item/use/index.css') }}">

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Penggunaan Item</h1>

    <a href="{{ route('items.use.create') }}" class="btn btn-primary mb-3">Tambah Penggunaan Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Total Penggunaan</th>
                <th>Tanggal Penggunaan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemUses as $key => $itemUse)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $itemUse->item->name }}</td>
                <td>{{ $itemUse->total_use }}</td>
                <td>{{ $itemUse->date_use }}</td>
                <td>{{ $itemUse->description }}</td>
                <td>
                    <a href="{{ route('item_use.edit', $itemUse->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('item_use.delete', $itemUse->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
