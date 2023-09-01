<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $currentMonth = now()->month;
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jumlahSuratMasuk' => SuratMasuk::count(),
            'jumlahSuratKeluar' => SuratKeluar::count(),
            'jumlahSuratDisposisi' => SuratMasuk::where('status', 'Sudah didisposisi')->count(),
            'jumlahSuratDisetujui' => SuratKeluar::where('status_check', 'Disetujui')->count(),

            'jumlahSuratMasukBulanIni' => SuratMasuk::whereMonth('tanggal_surat', $currentMonth)->count(),
            'jumlahSuratKeluarBulanIni' => SuratKeluar::whereMonth('tanggal_surat', $currentMonth)->count()

        ]);
    }

    public function getDataByMonthadnYear($bulan, $tahun)
    {
        $dataMasuk = SuratMasuk::whereYear('tanggal_surat', $tahun)
            ->whereMonth('tanggal_surat', $bulan)
            ->orderBy('tanggal_surat', 'asc')
            ->count();

        $dataKeluar = SuratKeluar::whereYear('tanggal_surat', $tahun)
            ->whereMonth('tanggal_surat', $bulan)
            ->orderBy('tanggal_surat', 'asc')
            ->count();

        return response()->json([
            'data_masuk' => $dataMasuk,
            'data_keluar' => $dataKeluar,
        ]);
    }
}
