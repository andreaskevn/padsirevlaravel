@extends('layouts.app')

@section('content')
    <h1>Daftar Transaksi Penjualan</h1>
    @if ($transaksis->isEmpty())
        <p>Tidak ada data transaksi.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->nama_produk }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
