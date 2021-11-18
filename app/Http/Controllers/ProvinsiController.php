<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provinsi/index', [
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
        return view('provinsi/create');
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
            'name' => 'required|string'
        ]);
        $validatedData['jumlah_penduduk'] = "0";
        Provinsi::create($validatedData);
        return redirect('/provinsi')->with('provinsi_added', 'Provinsi Baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        return view('provinsi/edit', [
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);
        $provinsi->update($validatedData);
        return redirect('/provinsi')->with('provinsi_updated', 'Data provinsi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        Kabupaten::where('provinsi_id', $provinsi->id)->delete();
        $provinsi->delete();
        return redirect('/provinsi')->with('provinsi_destroyed', 'Data provinsi berhasil dihapus!');
    }
}
