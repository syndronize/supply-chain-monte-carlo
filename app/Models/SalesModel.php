<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id_invoice';
    protected $fillable = ['nm_sales','no_hp','id_produk', 'jumlah', 'total','tgl_order'];
}
