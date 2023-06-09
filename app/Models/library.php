<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    use HasFactory;
    protected $fillable = ['id_buku', 'judul', 'deskripsi', 'pengarang', 'penerbit', 'gambar'];
    protected $table = 'library';
    public $timestamps = false;
}
