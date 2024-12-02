@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Loan</h1>
    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name_loan" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="name_loan" name="name_loan" value="{{ old('name_loan', $loan->name_loan) }}" required>
        </div>
        <div class="mb-3">
            <label for="item_id" class="form-label">Barang</label>
            <select class="form-control" id="item_id" name="item_id" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $loan->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->item_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Peran</label>
            <select class="form-control" id="role" name="role" required>
                <option value="murid" {{ $loan->role == 'murid' ? 'selected' : '' }}>Murid</option>
                <option value="karyawan" {{ $loan->role == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="specification" class="form-label">Spesifikasi</label>
            <input type="text" class="form-control" id="specification" name="specification" value="{{ old('specification', $loan->specification) }}" required>
        </div>
        <div class="mb-3">
            <label for="total_loans" class="form-label">Jumlah Pinjaman</label>
            <input type="number" class="form-control" id="total_loans" name="total_loans" value="{{ old('total_loans', $loan->total_loans) }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="loan_start_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="loan_start_date" name="loan_start_date" value="{{ old('loan_start_date', $loan->loan_start_date) }}" required>
        </div>
        <div class="mb-3">
            <label for="loan_end_date" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="loan_end_date" name="loan_end_date" value="{{ old('loan_end_date', $loan->loan_end_date) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $loan->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="baik" {{ $loan->status == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak" {{ $loan->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
</div>
@endsection
