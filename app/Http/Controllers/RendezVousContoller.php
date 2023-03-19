<?php

namespace App\Http\Controllers;

use App\Models\rendez_vous;
use Illuminate\Http\Request;

class RendezVousContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return rendez_vous::select('id_rdv','date_rdv','heure_rdv')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_rdv' => 'required',
            'heure_rdv' => 'required',
        ]);
        rendez_vous::create($request->post());
        return response()->json([
            'message' => 'Rendez_vous created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(rendez_vous $rendez_vous)
    {
        return response()->json([
            'rendez_vous' => $rendez_vous
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rendez_vous $rendez_vous)
    {
        $request->validate([
            'date_rdv' => 'required',
            'heure_rdv' => 'required',
        ]);
        $rendez_vous->fill($request->post())->update();
        return response()->json([
            'message' => 'Rendez_vous updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rendez_vous $rendez_vous)
    {
        $rendez_vous->delete();
        return response()->json([
            'message' => 'Rendez_vous deleted successfully'
        ]);
    }
}
