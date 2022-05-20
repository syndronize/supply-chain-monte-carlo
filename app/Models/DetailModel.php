<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_detail';
    protected $primaryKey = ['id_detail'];
    protected $fillable = ['id_transaksi', 'id_produk', 'jumlah','harga'];
}
