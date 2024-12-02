@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Item yang Diperbaiki</h1>

    <a href="{{ route('items.repair.create') }}" class="btn btn-primary mb-3">Tambah Perbaikan Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Jumlah Perbaikan</th>
                <th>Tanggal Perbaikan</th>
                <th>Deskripsi Perbaikan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $key => $repairItem)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $repairItem->damagedItem->item->name }}</td>
                <td>{{ $repairItem->repair_quantity }}</td>
                <td>{{ $repairItem->repair_date }}</td>
                <td>{{ $repairItem->repair_description }}</td>
                <td>
                    <a href="{{ route('repair-damaged-items.edit', $repairItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('repair-damaged-items.destroy', $repairItem->id) }}" method="POST" class="d-inline">
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
