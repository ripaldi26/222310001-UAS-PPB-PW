<?php

namespace App\Http\Controllers;

use App\Models\NamaSkema;
use Illuminate\Http\Request;

class NamaSkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NamaSkema $NamaSkema) {
            return view('skema.modules.screen1.index', [
                "data" => $NamaSkema->paginate(5)
            ]);
        }
        // ::with('idnamaskema')

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function getDataByID(NamaSkema $NamaSkema) {
        return view('skema.modules.screen2.show_list_bank', [
            "data" => $NamaSkema
        ]);
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NamaSkema $namaSkema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NamaSkema $namaSkema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NamaSkema $namaSkema)
    {
        //
    }
}
