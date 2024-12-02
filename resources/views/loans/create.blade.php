@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/loans/create.css') }}">
@section('content')
<div class="container">
    <h1>Tambah Loan</h1>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name_loan" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="name_loan" name="name_loan" required>
        </div>
        <div class="mb-3">
            <label for="item_id" class="form-label">Barang</label>
            <select class="form-control" id="item_id" name="item_id" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Peran</label>
            <select class="form-control" id="role" name="role" required>
                <option value="murid">Murid</option>
                <option value="karyawan">Karyawan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="specification" class="form-label">Spesifikasi</label>
            <input type="text" class="form-control" id="specification" name="specification" required>
        </div>
        <div class="mb-3">
            <label for="total_loans" class="form-label">Jumlah Pinjaman</label>
            <input type="number" class="form-control" id="total_loans" name="total_loans" min="1" required>
        </div>
        <div class="mb-3">
            <label for="loan_start_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="loan_start_date" name="loan_start_date" required>
        </div>
        <div class="mb-3">
            <label for="loan_end_date" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="loan_end_date" name="loan_end_date" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
