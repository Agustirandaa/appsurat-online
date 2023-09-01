<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];


    // Create Slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nomor_surat'
            ]
        ];
    }




    // Relasi ke tabel dosen
    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    // Relasi ke tabel Mahasiswa
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    // Relasi ke surat keterangan
    public function suratKeterangan()
    {
        return $this->hasOne(SuratKeterangan::class);
    }

    // Relasi ke surat Permohonan
    public function suratPermohonan()
    {
        return $this->hasOne(SuratPermohonan::class);
    }




    // Ganti yang biasa dikirim parameter ID ke SLUG
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    // Generate Nomor Surat
    public static function generateNomorSurat()
    {
        $lastSurat = SuratKeluar::latest('id')->first();

        if ($lastSurat) {
            $lastNumber = explode('-', $lastSurat->nomor_surat)[1];
            $nextNumber = intval($lastNumber) + 1;
        } else {
            $nextNumber = 1;
        }

        $now = Carbon::now();
        $tanggal = $now->day;
        $bulan = $now->month;
        $tahun = $now->year;

        return "B- $nextNumber/Un.08/TI/PP.00.$tanggal/$bulan/$tahun";
    }



    // Search Scope Filters

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['jenis_surat'] ?? false, function ($query, $jenis_surat) {
            return $query->where('jenis_surat', 'like', '%' . $jenis_surat . '%');
        });

        $query->when($filters['semester'] ?? false, function ($query, $semester) {
            return $query->where('semester', 'like', '%' . $semester . '%');
        });

        $query->when($filters['start_date'] ?? false, function ($query, $start_date) use ($filters) {
            $query->whereDate('tanggal_surat', '>=', $start_date);

            // Harusnya bisa pakek metode null coalescing ?? 
            // tetapi kasusnya kita mengecek, apakah end date terinput atau tidak ?
            // Makanya menggunakan isset()
            if (isset($filters['end_date'])) {
                $query->whereDate('tanggal_surat', '<=', $filters['end_date']);
            }
        });
    }
}
