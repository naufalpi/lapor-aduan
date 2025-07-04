<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aduan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'nama',
        'email',
        'nomor_wa',
        'kategori',
        'lokasi',
        'lampiran',
        'nomor_tiket',
        'status',
        'opd_id', // tambahkan relasi ke OPD
    ];

    protected $casts = [
        'lampiran' => 'array', // agar laravel otomatis decode JSON ke array
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

   
    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }


    public function riwayats()
    {
        return $this->hasMany(RiwayatAduan::class);
    }

 
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
