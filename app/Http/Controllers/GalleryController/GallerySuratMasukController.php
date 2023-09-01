<?php

namespace App\Http\Controllers\GalleryController;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class GallerySuratMasukController extends Controller
{
    public function index()
    {
        return view('dashboard.gallery.surat_masuk.index', [
            'title' =>  'Gallery surat masuk',
            'surats' => SuratMasuk::all()
        ]);
    }

    public function show($slug)
    {
        $suratMasuk = SuratMasuk::where('slug', $slug)->firstOrFail();
        return view('dashboard.gallery.surat_masuk.show', [
            'foto' => $suratMasuk
        ]);
    }
}
