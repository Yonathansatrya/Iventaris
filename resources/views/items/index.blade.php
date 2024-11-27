@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('header', 'Daftar Barang')

@section('content')
<a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Sumber Pengadaan</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Tipe Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->specification }}</td>
            <td>{{ $item->procurement_sources }}</td>
            <td>{{ $item->total_item }}</td>
            <td>{{ $item->condition }}</td>
            <td>{{ $item->type_item }}</td>
            <td>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
