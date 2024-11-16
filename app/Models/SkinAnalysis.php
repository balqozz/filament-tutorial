<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import HasFactory untuk menggunakan factories
use Illuminate\Database\Eloquent\Model; // Inherit dari Model

class SkinAnalysis extends Model
{
    use HasFactory;

    // Mendefinisikan atribut yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'skin_type',
        'skin_problems',
        'analysis_date',
        'image_path',
    ];

    // Mendefinisikan casting untuk atribut tertentu
    protected $casts = [
        'skin_problems' => 'array', // Menggunakan array untuk menyimpan beberapa masalah kulit
        'analysis_date' => 'datetime', // Menyimpan tanggal analisis dalam format datetime
    ];

    // Relasi dengan model User (satu analisis kulit dimiliki oleh satu pengguna)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
