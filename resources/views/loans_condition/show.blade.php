@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kondisi Peminjaman</h1>
    <table class="table">
        <tr>
            <th>Loan ID:</th>
            <td>{{ $condition->loan_id }}</td>
        </tr>
        <tr>
            <th>Kondisi Barang:</th>
            <td>{{ $condition->item_condition }}</td>
        </tr>
        <tr>
            <th>Keterangan:</th>
            <td>{{ $condition->description }}</td>
        </tr>
    </table>
    <a href="{{ route('loans_condition.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
