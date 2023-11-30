<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::where('est_cloture_ou_pas', 'pas cloture')->get();
        return view('espace_client.listEvenement', compact('evenements'));
    }

    /**
     * Show the form for creating a new reservation.
     */
    public function createReservation(Evenement $evenement)
    {
        return view('espace_client.formulaireReservation', compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeReservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->user_id = Auth::guard('web')->user()->id;
        $reservation->nombre_de_personne = $request->nombre_de_personne;
        $reservation->evenement_id = $request->evenement_id;
        $reservation->save();

        return redirect()->route('client.evenements.liste');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
