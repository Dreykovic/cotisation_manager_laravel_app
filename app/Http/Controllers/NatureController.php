<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Nature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class NatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $natures = Nature::with('cotisations')->get();

            // Calculer le montant total pour chaque nature
            $natures->map(function ($nature) {
                $montantTotal = $nature->cotisations->sum('montant');
                $nature->montant_total = $montantTotal;

                return $nature;
            });

            return view('pages.natures.index', compact('natures'));
        } catch (\Throwable $th) {
            dd($th->getMessage());

            return view('errors.500');
        }

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
        //

        try {
            $this->validate($request, [

                'designation' => 'required|string',

            ]);

            Nature::create([

                'designation' => $request->designation,

            ]);

            return response()->json(['ok' => true, 'message' => 'le motif de cotisation à été ajouté avec succès.']);
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
    public function show($encrypt_id)
    {
        //

        try {

            $numero = Crypt::decryptString($encrypt_id);
            $membres = Membre::with(['user'])->get();

            $nature = Nature::with(['cotisations'])->find($numero);

            return view('pages.natures.show', compact('nature', 'membres'));
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
            dd($th->getMessage(), $th->getLine());

            return view('errors.500');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nature $nature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nature $nature)
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
            $nature_id = Crypt::decryptString($encrypt_id);

            DB::table('natures')->where('id', $nature_id)->delete();

            return response()->json(['ok' => true, 'message' => 'le motif à été supprimé avec succès.']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['ok' => false, 'message' => $th->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);
        }
    }
}
