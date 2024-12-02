@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Loan</h1>
    <table class="table">
        <tr>
            <th>Nama Peminjam:</th>
            <td>{{ $loan->name_loan }}</td>
        </tr>
        <tr>
            <th>Barang:</th>
            <td>{{ $loan->item->item_name }}</td>
        </tr>
        <tr>
            <th>Jumlah:</th>
            <td>{{ $loan->total_loans }}</td>
        </tr>
        <tr>
            <th>Tanggal Pinjam:</th>
            <td>{{ $loan->loan_start_date }}</td>
        </tr>
        <tr>
            <th>Tanggal Kembali:</th>
            <td>{{ $loan->loan_end_date }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $loan->status }}</td>
        </tr>
    </table>
    <a href="{{ route('loans.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
