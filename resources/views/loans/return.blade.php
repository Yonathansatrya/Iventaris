@extends('layouts.app')

@section('title', 'Pengembalian Barang')

@section('content')
    <h2>Pengembalian Barang: {{ $loan->item->item_name }}</h2>

    <form action="{{ route('loans.storeCondition', $loan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="status_condition">Kondisi Barang</label>
            <select name="status_condition" id="status_condition" class="form-control" required>
                <option value="normal">Normal</option>
                <option value="rusak_ringan">Rusak Ringan</option>
                <option value="rusak_berat">Rusak Berat</option>
            </select>
        </div>

        <div class="form-group">
            <label for="damage_report">Penjelasan Kerusakan</label>
            <textarea name="damage_report" id="damage_report" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="photo_report">Foto Kerusakan (Opsional)</label>
            <input type="file" name="photo_report" id="photo_report" class="form-control">
        </div>

        <div class="form-group">
            <label for="responsibility">Tanggung Jawab</label>
            <input type="text" name="responsibility" id="responsibility" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pengembalian</button>
    </form>
@endsection
