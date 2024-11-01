<?php

namespace App\Observers;

use App\Models\TransaksiPenjualan;
use App\Models\Pelanggans;

class TransaksiPenjualanObserver
{
    public function created(TransaksiPenjualan $transaksi_penjualans)
    {
        // Hitung total harga dan update progress transaksi pelanggan
        $transaksi_penjualan->calculateTotalHarga();

        $pelanggan = Pelanggans::find($transaksi_penjualans->id_pelanggan);
        $pelanggan->progressTransaksi += $transaksi_penjualans->total_harga;
        $pelanggan->save();

        // Update tier member jika diperlukan
        $this->updateMemberTier($pelanggan);
    }

    protected function updateMemberTier($pelanggan)
    {
        $member = Member::find($pelanggan->id_member);
        if ($pelanggan->progressTransaksi >= $member->batas_atas_member) {
            $pelanggan->id_member = $member->id; // Ubah id_member sesuai tier baru
            $pelanggan->save();
        }
    }
}

