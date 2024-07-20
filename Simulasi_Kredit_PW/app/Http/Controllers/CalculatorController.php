<?php

namespace App\Http\Controllers;

use App\Models\banks;
use Illuminate\Http\Request;
use App\Models\JangkaWaktus; // Assuming JangkaWaktus model exists

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {

    $pokok_pinjaman = $request->input('pokokpinjaman');
    $jumlah_bunga = $request->input('hitungjumlahbunga');
    $rentang_waktu = $request->input('pilihjangkawaktu');

    $id_bank = $request->input('hitungnamabank');
    $banks = banks::find($id_bank); // Asumsikan Anda memiliki model Bank

    $total_bunga = $pokok_pinjaman * ($jumlah_bunga / 100) ;
    $total_dibayarkan = $pokok_pinjaman + $total_bunga;
    $anguran = $total_dibayarkan / $rentang_waktu;

    // Siapkan data untuk ditampilkan di view
    $data = [
        'pokok_pinjaman' => $pokok_pinjaman,
        'jumlah_bunga' => $jumlah_bunga,
        'rentang_waktu' => $rentang_waktu,
        'total_bunga' => $total_bunga,
        'total_dibayarkan' => $total_dibayarkan,
        'angsuran' => $anguran,
        'nama_bank' => $banks->nama_bank // Tambahkan kunci 'nama_bank'
    ];

    return view('skema.modules.screen4.output', $data);
    }

    public function calculateUser(Request $request)
    {

    $pokok_pinjaman = $request->input('pokokpinjaman');
    $jumlah_bunga = $request->input('hitungjumlahbunga');
    $rentang_waktu = $request->input('pilihjangkawaktu');

    $id_bank = $request->input('hitungnamabank');
    $banks = banks::find($id_bank); // Asumsikan Anda memiliki model Bank

    $total_bunga = $pokok_pinjaman * ($jumlah_bunga / 100) ;
    $total_dibayarkan = $pokok_pinjaman + $total_bunga;
    $anguran = $total_dibayarkan / $rentang_waktu;

    // Siapkan data untuk ditampilkan di view
    $data = [
        'pokok_pinjaman' => $pokok_pinjaman,
        'jumlah_bunga' => $jumlah_bunga,
        'rentang_waktu' => $rentang_waktu,
        'total_bunga' => $total_bunga,
        'total_dibayarkan' => $total_dibayarkan,
        'angsuran' => $anguran,
        'nama_bank' => $banks->nama_bank // Tambahkan kunci 'nama_bank'
    ];

    return view('skema.modules.screen5.outputUser', $data);
    }
}
