@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tanggung Jawab Peminjaman</h1>
    <a href="{{ route('responsibility_loans.create') }}" class="btn btn-primary mb-3">Tambah Tanggung Jawab</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>Nama Penanggung Jawab</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsibilities as $responsibility)
                <tr>
                    <td>{{ $responsibility->loan_id }}</td>
                    <td>{{ $responsibility->responsible_person }}</td>
                    <td>{{ $responsibility->description }}</td>
                    <td>
                        <a href="{{ route('responsibility_item_loans.show', $responsibility->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('responsibility_item_loans.edit', $responsibility->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('responsibility_item_loans.destroy', $responsibility->id) }}" method="POST" style="display:inline;">
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
