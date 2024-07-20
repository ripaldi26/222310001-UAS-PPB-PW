<?php

namespace App\Http\Controllers;

use App\Models\banks;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatebanksRequest;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(banks $banks) {
        return view('skema.modules.screen2.show_list_bank', [
            "data" => $banks->get()
        ]);
    }

    public function home(banks $banks) {
        return view('skema.modules.screen1.index', [
            "data" => $banks->get()
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nama_bank" => "required|max:15|regex:/^[a-zA-Z]+$/",
            "presentase_bunga" => "required|numeric"
        ]);

        $bankYangAda = banks::where('nama_bank', $request->nama_bank)
        // ->where('nama_bank', $request->nama_bank)
        ->first();

        if ($bankYangAda) {
            // bank sudah ada, kembalikan pesan yang sesuai
            return redirect('/createBank')->with('warning', "Nama Bank sudah ada untuk Bank yang dipilih.");
        } else {

        banks::create($validateData);

        return redirect('/listbank')->with('success',"Data sukses disimpan");
    }
    }

    public function getDataByID(banks $banks) {
        return view('skema.modules.screen2.show_data_bank', [
            "data" => $banks
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(banks $banks)
    {
        return view('skema.modules.screen2.edit', [
            "data" => $banks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, banks $banks){
        $validateData = $request->validate([
            "nama_bank" => "required|max:15|regex:/^[a-zA-Z]+$/|unique:banks,nama_bank",
            "presentase_bunga" => "required|numeric"
        ]);

        $banks->where("id", $banks->id)->update($validateData) ;

        return redirect('/listbank')->with('success', 'Data sukses diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(banks $banks) {
        $banks->delete($banks->id);

        return redirect('/listbank')->with('success',"Data sukses dihapus");
    }

    public function count(banks $banks) {
        return view('skema.modules.screen4.count', [
            "data" => $banks::with('jangkaWaktuses')->get()
        ]);
    }

    public function countUser(banks $banks) {
        return view('skema.modules.screen5.countUser', [
            "data" => $banks::with('jangkaWaktuses')->get()
        ]);
    }

    // Ubah fungsi getBanks() untuk mengambil data bank berdasarkan id yang dipilih dari dropdown.
    // Dengan menggunakan findOrFail($id), kita mendapatkan bank berdasarkan id yang dipilih dan kemudian mengembalikan nilai presentase_bunga dalam format JSON.
    public function getBanks($id){
        $bank = banks::findOrFail($id);
        return response()->json([
            'presentase_bunga' => $bank->presentase_bunga
        ]);
    }

    public function getJangkaWaktu($id)
    {
      // Cari bank berdasarkan ID
    $bank = banks::findOrFail($id);

      // Periksa apakah bank ditemukan
    if ($bank) {
        // Ambil data jangka waktu terkait bank tersebut (menggunakan relasi)
        $jangkaWaktuData = $bank->jangkaWaktuses;
        return response()->json($jangkaWaktuData);
    } else {
        // Bank tidak ditemukan, kembalikan response kosong
        return response()->json([]);
    }
    }


}
