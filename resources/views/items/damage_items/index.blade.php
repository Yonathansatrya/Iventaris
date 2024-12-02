@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<div class="container">
    <div class="content-header mb-4">
        <h1>Daftar Barang Rusak</h1>
        <a href="{{ route('items.damage.create') }}" class="btn btn-primary">New Barang Rusak</a>
    </div>

    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Jumlah Kerusakan</th>
                    <th>Tanggal Kerusakan</th>
                    <th>Deskripsi Kerusakan</th>
                    <th>Jenis Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($damages as $key => $damagedItem)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $damagedItem->item->name }}</td>
                    <td>{{ $damagedItem->quantity }}</td>
                    <td>{{ $damagedItem->damage_date }}</td>
                    <td>{{ $damagedItem->damage_description }}</td>
                    <td>{{ $damagedItem->item->type_item }}</td>
                    <td>
                        <a href="{{ route('damaged-items.edit', $damagedItem->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('damaged-items.repair', $damagedItem->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-cogs"></i>
                        </a>
                        <form action="{{ route('damaged-items.destroy', $damagedItem->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/Item/damage/index.css') }}">
@endsection
