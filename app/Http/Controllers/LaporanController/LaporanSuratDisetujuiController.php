<?php

namespace App\Http\Controllers\LaporanController;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class LaporanSuratDisetujuiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.laporan.surat_disetujui.index', [
            'title' =>  'Laporan Surat Disetujui',
            'suratdisetujui'    =>  SuratKeluar::with('suratKeterangan', 'suratpermohonan', 'suratpemberitahuan')->latest()->get(),
        ]);
    }
}
