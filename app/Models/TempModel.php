<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempModel extends Model
{
    use HasFactory;

    protected $table = 'temp';
    protected $primaryKey = ['id_temp'];
    protected $fillable = ['id_produk', 'jumlah','harga'];
}
