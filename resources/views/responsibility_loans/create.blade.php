@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Tanggung Jawab Peminjaman</h1>
    <form action="{{ route('responsibility_item_loans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="loan_id" class="form-label">Loan ID</label>
            <select class="form-control" id="loan_id" name="loan_id" required>
                @foreach ($loans as $loan)
                    <option value="{{ $loan->id }}">Loan #{{ $loan->id }} - {{ $loan->name_loan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="responsible_person" class="form-label">Nama Penanggung Jawab</label>
            <input type="text" class="form-control" id="responsible_person" name="responsible_person" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
