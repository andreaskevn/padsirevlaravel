<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    protected $fillable = ['id_user', 'id_pelanggan', 'total_harga', 'tanggal_transaksi'];

    public function calculateTotalHarga()
    {
        $detailTransaksi = $this->detailTransaksiPenjualans; // Ambil detail transaksi
        $totalHarga = 0;

        foreach ($detailTransaksi as $detail) {
            $totalHarga += $detail->total_harga_per_menu;
        }

        $this->total_harga = $totalHarga;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }   

    public function detailTransaksiPenjualans()
    {
        return $this->hasMany(DetailTransaksiPenjualan::class, 'id_transaksi_penjualan');
    }
}
