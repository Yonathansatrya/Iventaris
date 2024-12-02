@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Bahan Inventaris</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('items_in.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Bahan
    </a>

    @if($items->isEmpty())
        <div class="alert alert-warning">Tidak ada bahan yang tersedia.</div>
    @else
        <table class="table table-hover table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Bahan</th>
                    <th>Spesifikasi</th>
                    <th>Sumber</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->specification }}</td>
                        <td>{{ $item->procurement_sources }}</td>
                        <td>{{ $item->total_item }}</td>
                        <td>{{ $item->condition }}</td>
                        <td>
                            <span class="badge 
                                @if($item->status == 'Tersedia') bg-success 
                                @else bg-danger @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('items_in.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('items_in.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<link rel="stylesheet" href="{{ asset('css/Item/in/bahan.css') }}">
@endsection
