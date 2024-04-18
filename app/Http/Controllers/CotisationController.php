<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Membre;
use App\Models\Nature;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $cotisations = Cotisation::with(['membre', 'tresorier', 'nature'])->get();
            $cotisations = $cotisations->map(function ($cotisation) {
                $cotisation->montant_f = $this->formatMontant($cotisation->montant);
               $cotisation->date_cotisation = Carbon::parse(  $cotisation->date_cotisation)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY'); 
                return $cotisation;
            });
            return view('pages.cotisations.index', compact('cotisations'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());

            return view('errors.500');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $membres = Membre::with(['user'])->get();
            $natures = Nature::select(['id', 'designation'])->get();

            return view('pages.cotisations.create', compact('membres', 'natures'));
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
            dd($th->getMessage());

            return view('errors.500');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            $this->validate($request, [
                'montant' => 'required|numeric',
                'date' => 'required|date',
                'membre' => 'required|string',
                'type' => 'required|string',
                'mode' => 'required|in:Main à main,Tmoney,Flooz',
            ]);
            $membre_id = Crypt::decryptString($request->membre);
            $nature_id = Crypt::decryptString($request->type);
            $tresorier_id = auth()->user()->id;
            Cotisation::create([
                'membre_id' => $membre_id,
                'nature_id' => $nature_id,
                'tresorier_id' => $tresorier_id,
                'montant' => $request->montant,
                'date_cotisation' => $request->date,
            ]);

            return response()->json(['ok' => true, 'message' => 'la cotisation à été ajouté avec succès.']);
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
            return response()->json(['ok' => false, 'message' => $th->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotisation $cotisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotisation $cotisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypt_id)
    {

        //
        try {
            $cotisations_id = Crypt::decryptString($encrypt_id);

            DB::table('cotisations')->where('id', $cotisations_id)->delete();

            return response()->json(['ok' => true, 'message' => 'la cotisation à été supprimé avec succès.']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['ok' => false, 'message' => $th->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);
        }
    }
}
