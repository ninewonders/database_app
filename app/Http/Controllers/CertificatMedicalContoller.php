<?php

namespace App\Http\Controllers;

use App\Models\certificat_medical;
use Illuminate\Http\Request;

class CertificatMedicalContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return certificat_medical::select('NUM_CERTIF','NB_JRS_REPOS','DATE_REPOS')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NB_JRS_REPOS' => 'required',
            'DATE_REPOS' => 'required',
        ]);
        certificat_medical::create($request->post());
        return response()->json([
            'message' => 'Certificat Medical created successfully'
        ]); //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return response()->json([
            'request' => $request
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificat_medical $certificat_medical)
    {
        $request->validate([
            'NB_JRS_REPOS' => 'required',
            'DATE_REPOS' => 'required',
        ]);
        $certificat_medical->fill($request->post())->update();
        return response()->json([
            'message' => 'Certificat Medical updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificat_medical $certificat_medical)
    {
        $certificat_medical->delete();
        return response()->json([
            'message' => 'Certificat Medical deleted successfully'
        ]);
    }
}
