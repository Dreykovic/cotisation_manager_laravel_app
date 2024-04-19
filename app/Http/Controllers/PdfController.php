<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Nature;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{
    //
    public function get_attribute_values($attribute = "all")
    {
        try {
            $attribute = $attribute ?? 'all';  // Utilisation de l'opérateur null coalescing 
            if ($attribute === 'all') {
                return response()->json([]);
            }

            $users = User::join('membres', 'users.id', '=', 'membres.user_id')
                ->select('users.*')
                ->orderBy('users.' . $attribute)
                ->pluck("users." . $attribute) // Récupère toutes les valeurs de l'attribut
                ->unique() // Élimine les doublons
                ->values() // Réindexe le tableau
                ->map(function ($item, $key) {
                    return [
                        // 'id' => $key + 1, // auto_increment
                        'id' =>  $item , // auto_increment
                        'text' => $item   // valeur de l'attribut
                    ];
                })
                ->values() // Réindexe le tableau
                ->toArray(); // Convertit le tableau en PHP array

            return response()->json($users);
        } catch (\Throwable $th) {
            // Vous pouvez gérer l'exception ici si nécessaire
            return response()->json([]);
        }
    }

    public function membres($attribute = null, $value = null)
    {
        try {
            $orderBy = 'last_name';
    
            $query = User::join('membres', 'users.id', '=', 'membres.user_id')
                ->select('users.*')
                ->orderBy('users.' . $orderBy);
    
            if ($attribute  && $value) {
                $query->where('users.' . $attribute, $value);
            }
    
            $users = $query->get();
    
            $data = [
                'users' => $users
            ];
            
    
            $pdf = Pdf::loadView('pdf.membres', $data);
    
            $titre = "recenssement_par_{$orderBy}.pdf";
    
            return $pdf->download($titre);
        } catch (\Exception $e) {
            // return response()->json(['ok' => false, 'message' => $e->getMessage()]);

            // Vous pouvez gérer l'erreur ici, comme la logger ou retourner une réponse adaptée à l'erreur.
            return abort(400);
        }
    }
    
    public function cotisations($nature = null)
    {
        try {

            $natures = [];

            if ($nature === null) {
                $natures = Nature::with('cotisations')->get();
            } else {
                $nature_id = Crypt::decryptString($nature);
                $natures = Nature::with('cotisations')->where("id", "=", $nature_id)->get();
            }

            // Formater les montants des cotisations sans modifier les autres attributs
            $formattedNatures = $natures->map(function ($nature) {
                $formattedCotisations = $nature->cotisations->map(function ($cotisation) {
                    $cotisation->montant_f = $this->formatMontant($cotisation->montant);
                    $cotisation->date_cotisation = Carbon::parse($cotisation->date_cotisation)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY');
                    return $cotisation;
                });

                $nature->cotisations = $formattedCotisations;
                return $nature;
            });

            $data = [
                'natures' => $formattedNatures
            ];

            // return $data;





            $pdf = Pdf::loadView('pdf.cotisations', $data);

            $titre = "cotisations_par_nature.pdf";
            // $content = $pdf->download()->getOriginalContent();

            // Storage::put('public/pdf/cotisations.pdf', $content);

            //127.0.0.1:8000/download/pdf/membres
            return $pdf->download($titre);
        } catch (\Exception $e) {
            return abort(400);


            // return response()->json(['ok' => false, 'message' => $e->getMessage()]);

            // return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);

        }
    }
}
