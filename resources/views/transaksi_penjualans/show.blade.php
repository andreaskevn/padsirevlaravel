@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Transaksi Penjualan</h1>
    <p>ID: {{ $transaksiPenjualan->id }}</p>
    <p>Pelanggan: {{ $transaksiPenjualan->pelanggan->nama_pelanggan }}</p>
    <p>Total Harga: {{ $transaksiPenjualan->total_harga }}</p>
    <p>Tanggal Transaksi: {{ $transaksiPenjualan->tanggal_transaksi }}</p>
    <a href="{{ route('transaksi_penjualans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
