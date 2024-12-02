@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kondisi Peminjaman</h1>
    <a href="{{ route('loans_conditions.create') }}" class="btn btn-primary mb-3">Tambah Kondisi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>Kondisi Barang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conditions as $condition)
                <tr>
                    <td>{{ $condition->loan_id }}</td>
                    <td>{{ $condition->item_condition }}</td>
                    <td>{{ $condition->description }}</td>
                    <td>
                        <a href="{{ route('loans_condition.show', $condition->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('loans_condition.edit', $condition->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('loans_condition.destroy', $condition->id) }}" method="POST" style="display:inline;">
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
