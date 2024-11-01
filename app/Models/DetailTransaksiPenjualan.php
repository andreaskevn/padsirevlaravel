<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiPenjualan extends Model
{
    protected $fillable = ['id_transaksi_penjualan', 'id_menu', 'jumlah_menu', 'total_harga_per_menu'];

    public function calculateTotalHargaPerMenu()
    {
        $menu = Menu::find($this->id_menu);
        $this->total_harga_per_menu = $menu->harga_per_menu * $this->jumlah_menu;
        $this->save();
    }
}
