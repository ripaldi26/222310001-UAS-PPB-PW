<?php

namespace App\Http\Controllers;

use App\Models\JangkaWaktus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJangkaWaktusRequest;
use App\Http\Requests\UpdateJangkaWaktusRequest;

class JangkaWaktusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JangkaWaktus $JangkaWaktus) {
        return view('skema.modules.screen3.list_jangkaWaktu', [
            "data" => $JangkaWaktus::with('bank')->get()
        ]);
    }

    public function count(JangkaWaktus $JangkaWaktus) {
        return view('skema.modules.screen4.count', [
            "data" => $JangkaWaktus::with('bank')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data input dari formulir
    $validateData = $request->validate([
        "id_bank" => "required|numeric",
        "rentang_waktu" => "required|numeric"
    ]);

    // Memeriksa apakah durasi sudah ada untuk bank yang dipilih
    $durasiYangAda = JangkaWaktus::where('id_bank', $request->id_bank)
        ->where('rentang_waktu', $request->rentang_waktu)
        ->first();

    if ($durasiYangAda) {
        // Durasi sudah ada, kembalikan pesan yang sesuai
        return redirect('/home')->with('warning', "Jangka waktu sudah ada untuk bank yang dipilih.");
    } else {
        // Durasi belum ada, buat record baru
        JangkaWaktus::create($validateData);

        return redirect('/home')->with('success', "Data sukses disimpan.");
    }
}


    public function getDataByID(JangkaWaktus $JangkaWaktus) {
        return view('skema.modules.screen2.show_data_bank', [
            "data" => $JangkaWaktus
        ]);
     }

    /**
     * Display the specified resource.
     */
    public function show(JangkaWaktus $jangkaWaktus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JangkaWaktus $jangkaWaktus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJangkaWaktusRequest $request, JangkaWaktus $jangkaWaktus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JangkaWaktus $JangkaWaktus) {
        $JangkaWaktus->delete($JangkaWaktus->id);

        return redirect('/listJangkaWaktu')->with('success',"Data sukses dihapus");
    }

    public function getJangkaWaktu($id)
    {
        $JangkaWaktus = JangkaWaktus::where('id_bank', $id)->get();
        return response()->json($JangkaWaktus);
    }

}
