@extends('layouts.app')

@section('title', 'Form Peminjaman Barang')

@section('content')
    <h2>Peminjaman Barang</h2>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_name">Nama Siswa</label>
            <input type="text" name="student_name" id="student_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="item_id">Pilih Barang</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->item_name }} ({{ $item->code_item }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_start_date">Tanggal Mulai Peminjaman</label>
            <input type="date" name="borrow_start_date" id="borrow_start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="borrow_end_date">Tanggal Selesai Peminjaman</label>
            <input type="date" name="borrow_end_date" id="borrow_end_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Penggunaan</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Pinjam Barang</button>
    </form>
@endsection
