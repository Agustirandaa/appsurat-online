<?php

namespace App\Http\Controllers\LaporanController;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanSuratDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.laporan.surat_disposisi.index', [
            'title' =>  'Laporan Surat Disposisi',
            'surats'    =>  SuratMasuk::latest()->get(),
        ]);
    }
}
