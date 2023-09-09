<?php

namespace App\Http\Controllers\TransaksiController;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailSuratKeluar;
use App\Models\SuratKeluar;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransaksiSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaksi.surat_keluar.index', [
            'title' =>  'Transaksi surat keluar',
            'surats'  =>  SuratKeluar::with('suratKeterangan', 'suratpermohonan', 'suratpemberitahuan')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nextNomorSurat = SuratKeluar::generateNomorSurat();

        return view('dashboard.transaksi.surat_keluar.create', [
            'title' => 'Create surat keluar',
            'nextNomorSurat' => $nextNomorSurat,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $dataSuratKeluar = $request->validate([
            'slug' => 'required',
            'nomor_surat' => 'required|max:60',
            'jenis_surat' => 'required',
            'sifat_surat' => 'required|max:10',
            'status' => 'required|max:10',
            'tujuan_surat' => 'required',
            'tanggal_surat' => 'required',
            'semester' => 'required',
            'perihal_surat' => 'required',
            'lampiran' => 'required',
        ]);

        // Memeriksa apakah nomor surat sudah ada dalam database
        if (SuratKeluar::where('nomor_surat', $dataSuratKeluar['nomor_surat'])->exists()) {
            return redirect('/transaksi/surat-keluar/create')
                ->with('error', $dataSuratKeluar['nomor_surat'] . ' Nomor surat sudah tersedia di database');
        }

        $suratKeluar = SuratKeluar::create($dataSuratKeluar);

        // Jika status surat sebagai dosen atau mahasiswa

        if ($dataSuratKeluar['status'] == "Mahasiswa") {
            $dataMahasiswa = $request->validate([
                'nama' => 'required',
                'nim' => '',
                'program_studi' => ''
            ]);
            $mahasiswa = $suratKeluar->mahasiswa()->create($dataMahasiswa);
            // 
        } else if ($dataSuratKeluar['status'] == "Dosen") {
            $dataDosen = $request->validate([
                'nama' => 'required',
                'nip'  => '',
                'program_studi'  => '',
                'pangkat_gol' => '',
                'jabatan'   => ''
            ]);
            $dosen = $suratKeluar->dosen()->create($dataDosen);
        } else {
            // abort(404, 'Not Found');
        }



        // Jika jenis surat yang di pilih

        if ($dataSuratKeluar['jenis_surat'] == "Surat Keterangan") {
            $dataKeterangan = $request->validate([
                'judul_artikel' => '',
                'body_surat' => ''
            ]);
            $suratKeterangan = $suratKeluar->suratKeterangan()->create($dataKeterangan);
        } else if ($dataSuratKeluar['jenis_surat'] == "Surat Permohonan") {
            $dataPermohonan = $request->validate([
                'body_surat' => ''
            ]);
            $suratPermohonan = $suratKeluar->suratPermohonan()->create($dataPermohonan);
        } else if ($dataSuratKeluar['jenis_surat'] == "Surat Pemberitahuan") {
            $dataPemberitahuan = $request->validate([
                'nama' => 'required',
                'hari_tanggal' => '',
                'pukul' => '',
                'tempat' => '',
                'acara' => '',
                'peserta' => '',
                'body_surat' => ''
            ]);
            $suratPemberitahuan = $suratKeluar->suratPemberitahuan()->create($dataPemberitahuan);
        } else {
            abort(404, 'Not Found');
        }

        // Set data dalam email
        $dataMail = $dataSuratKeluar;
        $emailUser = User::where('level', 'is_user')->get('email');
        Mail::to($emailUser)->send(new SendEmailSuratKeluar($dataMail));

        return redirect('/transaksi/surat-keluar')
            ->with('success', 'New incoming mail has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($slug, $jenis, $status)
    {

        if ($jenis == 'Surat Keterangan') {
            $jenis = 'surat_keterangan';
            $data = SuratKeluar::with('suratketerangan', 'suratpermohonan')->where('slug', $slug)->first();
            return view("dashboard.transaksi.surat_keluar.view.$jenis.edit", [
                'title' => 'Edit surat keluar',
                'surat' => $data
            ]);
        } else if ($jenis == 'Surat Permohonan') {
            $jenis = 'surat_permohonan';
            $data = SuratKeluar::with('suratpermohonan')->where('slug', $slug)->first();
            return view("dashboard.transaksi.surat_keluar.view.$jenis.edit", [
                'title' => 'Edit surat keluar',
                'surat' => $data
            ]);
        } else if ($jenis == 'Surat Pemberitahuan') {
            $jenis = 'surat_pemberitahuan';
            $data = SuratKeluar::with('suratpemberitahuan')->where('slug', $slug)->first();
            return view("dashboard.transaksi.surat_keluar.view.$jenis.edit", [
                'title' => 'Edit surat keluar',
                'surat' => $data
            ]);
        } else {
            abort(404, 'Not Found.');
        }
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, SuratKeluar $suratKeluar)
    {

        $rulesSuratKeluar = [
            'nomor_surat' => 'required|max:60',
            'tujuan_surat' => '',
            'sifat_surat' => 'required|max:10',
            'status' => 'required',
            'jenis_surat' => 'required',
            'perihal_surat' => 'required',
            'tanggal_surat' => 'required',
            'semester' => 'required',
            'lampiran' => 'required',
        ];

        if ($request->slug != $suratKeluar->slug) {
            $rulesSuratKeluar['slug'] =  'required|unique:surat_keluars';
        }
        $validateData = $request->validate($rulesSuratKeluar);


        // Cek status 
        if ($validateData['status'] === 'Mahasiswa') {
            $dataUpdateMahasiswa = $request->validate([
                'nama' => 'required',
                'nim' => '',
                'program_studi' => ''
            ]);
            $suratKeluar->mahasiswa->update($dataUpdateMahasiswa);
        } else if ($validateData['status'] === 'Dosen') {
            $dataUpdateDosen = $request->validate([
                'nama' => 'required',
                'nip' => '',
                'pangkat_gol' => '',
                'jabatan' => ''
            ]);
            $suratKeluar->dosen->update($dataUpdateDosen);
        }

        // Cek jenis surat
        if ($validateData['jenis_surat'] === 'Surat Keterangan') {
            $dataUpdateSurat = $request->validate([
                'judul_artikel' => '',
                'body_surat' => ''
            ]);
            $suratKeluar->suratKeterangan->update($dataUpdateSurat);
        } else if ($validateData['jenis_surat'] === 'Surat Permohonan') {
            $dataUpdateSurat = $request->validate([
                'body_surat' => ''
            ]);
            $suratKeluar->suratPermohonan->update($dataUpdateSurat);
        } else if ($validateData['jenis_surat'] === 'Surat Pemberitahuan') {
            $dataUpdateSurat = $request->validate([
                'nama' => 'required',
                'hari_tanggal' => '',
                'pukul' => '',
                'tempat' => '',
                'acara' => '',
                'peserta' => '',
                'body_surat' => ''
            ]);
            $suratKeluar->suratPemberitahuan->update($dataUpdateSurat);
        } else {
            abort(404, 'Not Found');
        }

        $suratKeluar->where('id', $suratKeluar->id)
            ->update($validateData);

        return redirect('/transaksi/surat-keluar')
            ->with('success', 'Mail has been Update!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(SuratKeluar $suratKeluar)
    {
        SuratKeluar::destroy($suratKeluar->id);
        return redirect('/transaksi/surat-keluar')
            ->with('success', 'Mail has been deleted!');
    }

    // Check Slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SuratKeluar::class, 'slug', $request->nomor_surat);
        return response()->json(['slug' => $slug]);
    }
}
