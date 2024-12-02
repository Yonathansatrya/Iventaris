@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Tanggung Jawab Peminjaman</h1>
    <table class="table">
        <tr>
            <th>Loan ID:</th>
            <td>{{ $responsibility->loan_id }}</td>
        </tr>
        <tr>
            <th>Nama Penanggung Jawab:</th>
            <td>{{ $responsibility->responsible_person }}</td>
        </tr>
        <tr>
            <th>Deskripsi:</th>
            <td>{{ $responsibility->description }}</td>
        </tr>
    </table>
    <a href="{{ route('responsibility_item_loans.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
