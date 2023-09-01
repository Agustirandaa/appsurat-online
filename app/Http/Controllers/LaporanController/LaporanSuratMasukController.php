<?php

namespace App\Http\Controllers\LaporanController;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.laporan.surat_masuk.index', [
            'title'     =>  'Laporan surat masuk',
            'surats'    =>  SuratMasuk::latest()->filter(request(['pengirim', 'semester', 'start_date', 'end_date']))->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        return view('dashboard.laporan.surat_masuk.show', [
            'title' => 'Detail surat',
            'surat' => $suratMasuk
        ]);
    }



    public function edit(SuratMasuk $suratMasuk)
    {

        $this->authorize('is_user');
        return view('dashboard.laporan.surat_disposisi.edit', [
            'title' =>  'Disposisi surat',
            'surat' => $suratMasuk
        ]);
    }


    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $validateData = $request->validate([
            'catatan_disposisi' => 'required|max:200',
        ]);

        // Ambil nilai-nilai dari checkbox dan pisahkan dengan , jika lebih dr satu 
        $selectedOptions = $request->input('options', []);
        $selectedOptionsString = implode(', ', $selectedOptions);
        $validateData['disposisi'] = $selectedOptionsString;

        $validateData['status'] = 'Sudah didisposisi';
        $suratMasuk->where('id', $suratMasuk->id)
            ->update($validateData);

        return redirect('/laporan/surat-masuk')
            ->with('success', 'New disposition mail has been added!');
    }
}
