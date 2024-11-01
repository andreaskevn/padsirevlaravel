@extends('layouts.app')

@section('content')
<x-app.header>
<div class="container">
    <h1>Edit Transaksi Penjualan</h1>
    <form action="{{ route('transaksi_penjualans.update', $transaksiPenjualan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_user">ID User</label>
            <input type="text" class="form-control" name="id_user" value="{{ $transaksiPenjualan->id_user }}" required>
        </div>
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <input type="text" class="form-control" name="id_pelanggan" value="{{ $transaksiPenjualan->id_pelanggan }}" required>
        </div>
        <!-- Add other fields as necessary -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
<x-app.header>
@endsection
