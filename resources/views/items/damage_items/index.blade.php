@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Item Rusak</h1>

    <a href="{{ route('items.damage.create') }}" class="btn btn-primary mb-3">Tambah Item Rusak</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Jumlah Kerusakan</th>
                <th>Tanggal Kerusakan</th>
                <th>Deskripsi Kerusakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $damages as $key => $damagedItem)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $damagedItem->item->name }}</td>
                <td>{{ $damagedItem->quantity }}</td>
                <td>{{ $damagedItem->damage_date }}</td>
                <td>{{ $damagedItem->damage_description }}</td>
                <td>
                    <a href="{{ route('damaged-items.edit', $damagedItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('damaged-items.destroy', $damagedItem->id) }}" method="POST" class="d-inline">
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
