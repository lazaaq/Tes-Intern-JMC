<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kabupaten/index', [
            'kabupatens' => Kabupaten::with(['provinsi'])->search()->get(),
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten/create', [
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'provinsi_id' => 'required',
            'jumlah_penduduk' => 'required|digits_between:0,1000000000'
        ]);
        Kabupaten::create($validatedData);
        $provinsi = Provinsi::find($validatedData['provinsi_id']);
        $jumlah_penduduk = $provinsi->jumlah_penduduk + $validatedData['jumlah_penduduk'];
        $provinsi->update([
            'jumlah_penduduk' => $jumlah_penduduk
        ]);
        return redirect('/kabupaten')->with('kabupaten_added', 'Data Kabupaten berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        return view('kabupaten/show', [
            'kabupaten' => $kabupaten
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        return view('kabupaten/edit', [
            'kabupaten' => $kabupaten,
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'provinsi_id' => 'required',
            'jumlah_penduduk' => 'required|digits_between:0,1000000000'
        ]);
        $kabupaten->update($validatedData);
        return redirect('/kabupaten')->with('kabupaten_updated', 'Data Kabupaten berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect('/kabupaten')->with('kabupaten_destroyed', 'Data Kabupaten berhasil dihapus!');
    }
}
