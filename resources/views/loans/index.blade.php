@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/loans/index.css') }}">
@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>
    <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Deskripsi Penggunaan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->name_loan }}</td>
                    <td>{{ $loan->item->item_name }}</td>
                    <td>{{ $loan->total_loans }}</td>
                    <td>{{ $loan->loan_start_date }}</td>
                    <td>{{ $loan->loan_end_date }}</td>
                    <td>{{ $loan->description }}</td>
                    <td>{{ $loan->status }}</td>
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
