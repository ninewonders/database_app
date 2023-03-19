<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;

class factureContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return facture::select('ID_FACTURE','PRIX')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PRIX' => 'required',
        ]);
        facture::create($request->post());
        return response()->json([
            'message' => 'Facture created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(facture $facture)
    {
        return response()->json([
            'facture' => $facture
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facture $facture)
    {
        $request->validate([
            'PRIX' => 'required',
        ]);
        $facture->fill($request->post())->update();
        return response()->json([
            'message' => 'Facture updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facture $facture)
    {
        $facture->delete();
        return response()->json([
            'message' => 'Facture deleted successfully'
        ]);
    }
}
