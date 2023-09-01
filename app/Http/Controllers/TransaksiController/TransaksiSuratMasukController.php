<?php

namespace App\Http\Controllers\TransaksiController;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailSuratMasuk;
use App\Models\User;

class TransaksiSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaksi.surat_masuk.index', [
            'title'     =>  'Transaksi surat masuk',
            'surats'    =>  SuratMasuk::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.transaksi.surat_masuk.create', [
            'title' =>  'Create surat masuk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'pengirim' => 'required|max:30',
            'nomor_surat' => 'required|max:60',
            'slug' => 'required|unique:surat_masuks',
            'sifat_surat' => 'required|max:10',
            'tanggal_surat' => 'required',
            'jenis_surat' => 'required',
            'perihal_surat' => 'required',
            'image' =>  'image|file|max:1024',
            'tanggal_diterima' => 'required',
            'semester' => 'required',
        ]);

        $validateData['image'] = $request->file('image')->store('suratmasuk-images');
        SuratMasuk::create($validateData);

        // Set data dalam email
        $dataMail = $validateData;
        $emailUser = User::where('level', 'is_user')->get('email');
        Mail::to($emailUser)->send(new SendEmailSuratMasuk($dataMail));

        return redirect('/transaksi/surat-masuk')
            ->with('success', 'New incoming mail has been added!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(SuratMasuk $suratMasuk)
    // {
    //     return view('dashboard.transaksi.surat_masuk.show', [
    //         'title' => 'Detail surat',
    //         'surat' => $suratMasuk
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        // ddd($suratMasuk);
        return view('dashboard.transaksi.surat_masuk.edit', [
            'surat' => $suratMasuk,
            'title' =>  'Edit surat masuk'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $rules = [
            'pengirim' => 'required|max:30',
            'nomor_surat' => 'required|max:60',
            'sifat_surat' => 'required|max:10',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'jenis_surat' => 'required',
            'image' =>  'image|file|max:1024',
            'tanggal_diterima' => 'required',
            'semester' => 'required',
        ];

        // Cek aapakah ada slug baru
        if ($request->slug != $suratMasuk->slug) {
            $rules['slug'] =  'required|unique:surat_masuks';
        }

        $validateData = $request->validate($rules);

        // Cek image
        if ($request->file('image')) {
            // jika ada image baru, hapus image lama di folder storage
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('suratmasuk-images');
        }

        SuratMasuk::where('id', $suratMasuk->id)
            ->update($validateData);

        return redirect('/transaksi/surat-masuk')
            ->with('success', 'Mail has been Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        // Delete beserta gambar
        if ($suratMasuk->image) {
            Storage::delete($suratMasuk->image);
        }
        SuratMasuk::destroy($suratMasuk->id);
        return redirect('/transaksi/surat-masuk')
            ->with('success', 'Mail has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SuratMasuk::class, 'slug', $request->nomor_surat);
        return response()->json(['slug' => $slug]);
    }
}
