<?php

namespace App\Http\Controllers\LaporanController;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class LaporanSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.laporan.surat_keluar.index', [
            'title' =>  'Laporan Surat Keluar',
            'surats' =>  SuratKeluar::with('suratKeterangan', 'suratpermohonan', 'suratpemberitahuan')->latest()
                ->filter(request(['jenis_surat', 'semester', 'start_date', 'end_date']))->get(),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jenis, $slug)
    {
        $this->authorize('is_user');

        $suratKeluar = SuratKeluar::with('suratketerangan', 'suratpermohonan')->where('slug', $slug)->first();
        return view('dashboard.laporan.surat_disetujui.edit', [
            'title' =>  'Setujui Surat',
            'surat' => $suratKeluar
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $rules = [
            'name_check' => 'required',
            'catatan' => 'required',
            'status_check'  => 'required',
            'tanggal_check' => 'required'
        ];

        $validateData = $request->validate($rules);
        $suratKeluar->where('id', $suratKeluar->id)
            ->update($validateData);

        return redirect('/laporan/surat-keluar')
            ->with('success', 'New mail has been submit!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar, $slug, $jenis, $status)
    {
        if ($jenis == "Surat Keterangan") {
            $jenis = 'surat_keterangan';
        } else if ($jenis == "Surat Permohonan") {
            $jenis = 'surat_permohonan';
        } else if ($jenis == "Surat Pemberitahuan") {
            $jenis = 'surat_pemberitahuan';
        } else {
            abort(404, 'Not Found');
        }

        $suratKeluar = SuratKeluar::where('slug', $slug)->first();

        if ($status === 'Mahasiswa') {
            // Jika status adalah Mahasiswa, tampilkan data dari relasi Mahasiswa
            $dataMahasiswa = $suratKeluar->mahasiswa;
            return view("dashboard.laporan.surat_keluar.view.$jenis.show", [
                'title' => 'Detail surat keluar',
                'surat' => $suratKeluar,
                // 'data' => $dataMahasiswa,
            ]);
        } else if ($status === 'Dosen') {
            // Jika status adalah Dosen, tampilkan data dari relasi Dosen
            $dataDosen = $suratKeluar->dosen;
            return view("dashboard.laporan.surat_keluar.view.$jenis.show", [
                'title' => 'Detail surat keluar',
                'surat' => $suratKeluar,
                // 'data' => $dataDosen,
            ]);
        } else {
            return view("dashboard.laporan.surat_keluar.view.$jenis.show", [
                'title' => 'Detail surat keluar',
                'surat' => $suratKeluar,
                // 'data' => $dataDosen,
            ]);
        }
    }
}
