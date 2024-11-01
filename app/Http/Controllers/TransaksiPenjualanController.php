<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use App\Models\DetailTransaksiPenjualan;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    // Menampilkan daftar transaksi penjualan
    public function index()
    {
        $transaksi_penjualans = TransaksiPenjualan::with('pelanggan')->get();

        // Mengirim data ke view dengan variabel attributes
        $background = 'bg-gray-100'; // atau kelas lain sesuai kebutuhan
        $sidebarVariant = 'dark';
        $headerVariant = 'light';
        $variant = 'dark';
        $background = 'bg-white-100';

        return view('transaksi_penjualans', compact('background', 'sidebarVariant', 'headerVariant', 'transaksi_penjualans', 'veriant', 'background'));
    }

    // Menampilkan form untuk membuat transaksi penjualan baru
    public function create()
    {
        // Variabel untuk pengaturan sidebar, header, dan background
            $sidebarVariant = 'light'; // Ganti dengan nilai yang sesuai
            $headerVariant = 'dark';   // Ganti dengan nilai yang sesuai
            $background = 'bg-white-100';       // Ganti dengan nilai yang sesuai
            $variant = 'dark';

        return view('transaksi_penjualans.create', compact('background', 'sidebarVariant', 'headerVariant', 'variant'));
    }

    // Menyimpan transaksi penjualan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'detailTransaksi' => 'required|array',
            'detailTransaksi.*.id_menu' => 'required|exists:menus,id',
            'detailTransaksi.*.jumlah_menu' => 'required|integer|min:1',
        ]);

        // Membuat transaksi penjualan
        $transaksi = TransaksiPenjualan::create([
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_transaksi' => now(),
        ]);

        // Menyimpan detail transaksi
        foreach ($request->detailTransaksi as $detail) {
            $detailTransaksi = new DetailTransaksiPenjualan($detail);
            $detailTransaksi->id_transaksi_penjualan = $transaksi->id;
            $detailTransaksi->calculateTotalHargaPerMenu(); // Hitung total harga per menu
            $detailTransaksi->save();
        }

        // Observer akan menangani pembaruan progress pelanggan secara otomatis

        return redirect()->route('transaksi_penjualans.index')->with('success', 'Transaksi penjualan berhasil dibuat.');
    }

    // Menampilkan detail dari transaksi penjualan tertentu
    public function show($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::with(['detailTransaksiPenjualans.menu'])->findOrFail($id);
        
        // Variabel untuk pengaturan sidebar, header, dan background
        $attributes = [
            'sidebarVariant' => 'default',  // Ganti dengan nilai yang sesuai
            'headerVariant' => 'default',    // Ganti dengan nilai yang sesuai
            'background' => 'bg-white',       // Ganti dengan nilai yang sesuai
        ];

        return view('transaksi_penjualans.show', compact('transaksiPenjualan', 'attributes'));
    }

    // Menampilkan form untuk mengedit transaksi penjualan
    public function edit($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);

        // Variabel untuk pengaturan sidebar, header, dan background
        $attributes = [
            'sidebarVariant' => 'default',  // Ganti dengan nilai yang sesuai
            'headerVariant' => 'default',    // Ganti dengan nilai yang sesuai
            'background' => 'bg-white',       // Ganti dengan nilai yang sesuai
        ];

        return view('transaksi_penjualans.edit', compact('transaksiPenjualan', 'attributes'));
    }

    // Memperbarui transaksi penjualan yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
        ]);

        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        $transaksiPenjualan->update([
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_transaksi' => now(),
        ]);

        return redirect()->route('transaksi_penjualans.index')->with('success', 'Transaksi penjualan berhasil diperbarui.');
    }

    // Menghapus transaksi penjualan
    public function destroy($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        $transaksiPenjualan->delete();

        return redirect()->route('transaksi_penjualans.index')->with('success', 'Transaksi penjualan berhasil dihapus.');
    }
}
