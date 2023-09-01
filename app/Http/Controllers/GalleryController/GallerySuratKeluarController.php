<?php

namespace App\Http\Controllers\GalleryController;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class GallerySuratKeluarController extends Controller
{
    public function index()
    {
        return view('dashboard.gallery.surat_keluar.index', [
            'title' =>  'Gallery surat keluar',
            'surats' => SuratKeluar::with('suratketerangan', 'suratpermohonan')->latest()->get()
        ]);
    }
}
