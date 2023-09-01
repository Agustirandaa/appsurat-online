<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use App\Models\DisposisiSurat;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nomor_surat'
            ]
        ];
    }

    // Ganti yang biasa dikirim parameter ID ke SLUG
    public function getRouteKeyName(): string
    {
        return 'slug';
    }




    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['pengirim'] ?? false, function ($query, $pengirim) {
            return $query->where('pengirim', 'like', '%' . $pengirim . '%');
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
