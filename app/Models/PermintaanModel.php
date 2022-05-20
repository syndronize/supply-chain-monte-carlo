<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanModel extends Model
{
    use HasFactory;

    protected $table = 'permintaan';
    protected $primaryKey = 'id_permintaan';
    protected $fillable = ['id_produk', 'total_permintaan', 'tanggal_permintaan'];
}
