@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi Penjualan</h1>
    <form action="{{ route('transaksi_penjualans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_user">ID User</label>
            <input type="text" class="form-control" name="id_user" required>
        </div>
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <input type="text" class="form-control" name="id_pelanggan" required>
        </div>
        <!-- Add other fields as necessary -->
        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
    </form>
</div>
@endsection
