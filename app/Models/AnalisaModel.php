<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaModel extends Model
{
    use HasFactory;

    protected $table = 'analisa_persediaan';
    protected $primaryKey = 'id_analisa';
    protected $fillable = ['id_produk', 'tgl_prediksi', 'hasil_analisa'];
}
