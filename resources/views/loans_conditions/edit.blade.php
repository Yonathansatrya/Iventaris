@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kondisi Peminjaman</h1>
    <form action="{{ route('loans_condition.update', $condition->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="loan_id" class="form-label">Loan ID</label>
            <select class="form-control" id="loan_id" name="loan_id" required>
                @foreach ($loans as $loan)
                    <option value="{{ $loan->id }}" @if($condition->loan_id == $loan->id) selected @endif>
                        Loan #{{ $loan->id }} - {{ $loan->name_loan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="item_condition" class="form-label">Kondisi Barang</label>
            <input type="text" class="form-control" id="item_condition" name="item_condition" value="{{ $condition->item_condition }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Keterangan</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $condition->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
