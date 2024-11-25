@extends('layouts.app')

@section('title', 'Daftar Peminjaman Barang')

@section('content')
    <h2>Daftar Peminjaman Barang</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Barang</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->student_name }}</td>
                    <td>{{ $loan->item->item_name }}</td>
                    <td>{{ $loan->borrow_start_date }}</td>
                    <td>{{ $loan->borrow_end_date }}</td>
                    <td>
                        <a href="{{ route('loans.returnItem', $loan) }}" class="btn btn-warning">Kembalikan</a>
                        <a href="{{ route('loans.edit', $loan) }}" class="btn btn-primary">Perpanjang</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
