<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Membre;
use App\Models\Nature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $membres = Membre::with('user')->get();

            return view('pages.membres.index', compact('membres'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());

            return view('errors.500');
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            //code...
            return view('pages.auth.sign-up.register');

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage(), $th->getLine());

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

                'date' => 'required|date',
                'email' => 'email',
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'telephone' => 'required|string',
                'pays' => 'required|string',
                'ville' => 'required|string',

                'pere' => 'required|string',
                'mere' => 'required|string',
                'sexe' => 'required|in:Masculin,Féminin',

            ]);
            
     $date =Carbon::parse( $request->date);
            // return response()->json(['ok' => true, 'message' => "Vous avez été enregistrer avec succès. Votre numéro d'ordre est {$date}"]);
        

            if ($this->isAdult($request->date)) {
                $user = User::create([
                    'last_name' => $request->nom,
                    'first_name' => $request->prenom,
                    'email' => $request->email,
                    'date_naissance' =>Carbon::parse( $request->date),
                    'pays' => $request->pays,
                    'ville' => $request->ville,

                    'sexe' => $request->sexe,
                    'nom_mere' => $request->mere,
                    'nom_pere' => $request->pere,
                    'contact' => $request->telephone,
                ]);
                $membre = Membre::create(['user_id' => $user->id]);
                $role = Role::where('name', 'Membre')->first();
                $user->assignRole([$role->id]);
                $membre_id = Crypt::encryptString($membre->id);

                return response()->json(['ok' => true, 'message' => "Vous avez été enregistrer avec succès. Votre numéro d'ordre est {$membre->id}", 'membre_id' => $membre_id]);
            }
            return response()->json(['ok' => false, 'message' => "Pour vous enregisttrer, vous devez avoir au moins 18 ans"]);
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
    public function edit(Request $request, $encrypt_id)
    {
        try {
            $membre_id = Crypt::decryptString($encrypt_id);
            $membre = Membre::with(['cotisations', 'user'])->find($membre_id);
            $natures = Nature::select(['id', 'designation'])->get();
            $segments = $request->segments();
            // dd($segments);
            $segment_before_id = count($segments) >= 2 ? $segments[count($segments) - 2] : null;
            // dd($segment_before_id);
            switch ($segment_before_id) {
                case 'info':
                    return view('pages.membres.settings.info', compact('membre', 'natures'));
                case 'cotisations':
                    return view('pages.membres.settings.cotisations', compact('membre', 'natures'));
                case 'mot-de-passe':
                    return view('pages.membres.settings.mot-de-passe', compact('membre', 'natures'));
                case 'cotisations-add':
                    return view('pages.membres.settings.cotisation-add', compact('membre', 'natures'));
                default:
                    abort(404); // Handle invalid URIs
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage(), $th->getLine());

            return view('errors.500');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($encrypt_id)
    {
        //
        try {

            $numero = Crypt::decryptString($encrypt_id);

            $membre = Membre::with(['user', 'cotisations'])->find($numero);

            return view('pages.membres.numero', compact('numero', 'membre'));
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
            dd($th->getMessage(), $th->getLine());

            return view('errors.500');

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membre $membre)
    {
        try {
            $this->validate($request, [

                'date' => 'required|date',
                'email' => 'required|email',
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'telephone' => 'required|string',
                'pays' => 'required|string',
                'ville' => 'required|string',
                'quartier' => 'required|string',
                'pere' => 'required|string',
                'mere' => 'required|string',
                'sexe' => 'required|in:Masculin,Féminin',
                'membre' => 'required|string',
            ]);

            $membre_id = Crypt::decryptString($request->membre);
            $membre = Membre::find($membre_id);
            $user = $membre->user;
            $user->last_name = $request->nom;
            $user->first_name = $request->prenom;
            $user->email = $request->email;
            $user->date_naissance = $request->date;
            $user->pays = $request->pays;
            $user->ville = $request->ville;
            $user->quartier = $request->quartier;
            $user->sexe = $request->sexe;
            $user->nom_mere = $request->mere;
            $user->nom_pere = $request->pere;
            $user->contact = $request->telephone;
            $user->save();

            return response()->json(['ok' => true, 'message' => 'les informations du membre  sont misent à jour avec succès.']);
        } catch (\Throwable $th) {
            //throw $th;
            //throw $th;
            return response()->json(['ok' => false, 'message' => $th->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypt_id)
    {
        //
        try {
            $membre_id = Crypt::decryptString($encrypt_id);
            $membre = Membre::find($membre_id);

            DB::table('users')->where('id', $membre->user->id)->delete();

            return response()->json(['ok' => true, 'message' => 'l\'utilisateur à été supprimé avec succès.']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['ok' => false, 'message' => $th->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);
        }
    }
}
