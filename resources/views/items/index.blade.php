@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Tambah Barang Baru</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tipe Barang</th>
                    <th>Total Barang</th>
                    <th>Status Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->code_item }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ ucfirst($item->type_item) }}</td>
                        <td>{{ $item->total_item }}</td>
                        <td>{{ \App\Models\Item::getStatuses()[$item->status] }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
