<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvenementRequest;
use App\Mail\EmailConfirmationReservation;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::where('association_id', Auth::guard('association')->user()->id)->get();

        return view('home', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.add_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvenementRequest $request)
    {

        $credentials = $request->validated();

        $fileName = time() . "." . $request->file('path_image')->extension();

        $image = $request->path_image->storeAs(
            'photo_evenements',
            $fileName,
            'public'
        );

        DB::table('evenements')->insert([
            "libelle" => $credentials['libelle'],
            "date_limite_inscription" => $credentials['date_limite_inscription'],
            "description" => $credentials['description'],
            "path_image" => $image,
            "est_cloture_ou_pas" => $credentials['est_cloture_ou_pas'],
            "date_evenement" => $credentials['date_evenement'],
            "association_id" => Auth::guard('association')->user()->id,
        ]);

        Mail::to('imaletbenji@gmail.com')->send(new EmailConfirmationReservation());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        return view('detail_evenement', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        if (Gate::denies('update-evenement', $evenement)) {
            return back();
        }
        return view('forms.update_form', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {


        if ($request->hasFile($request->path_image)) {
            $fileName = time() . "." . $request->path_image->extension();

        $image = $request->path_image->storeAs(
            'photo_evenements',
            $fileName,
            'public'
        );

        }else {
            $image = $evenement->path_image;
        }

        $evenement->libelle = $request->libelle;
        $evenement->date_limite_inscription = $request->date_limite_inscription;
        $evenement->description = $request->description;
        $evenement->path_image = $image;
        $evenement->est_cloture_ou_pas = $request->est_cloture_ou_pas;
        $evenement->date_evenement = $request->date_evenement;
        $evenement->date_evenement = $request->date_evenement;

        $evenement->save();

        return redirect()->route('evenement.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenement.list');
    }
}
