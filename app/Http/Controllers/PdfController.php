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
    public function membres($orderBy = null)
    {
        try {

            $orderBy = $orderBy ?? 'last_name';  // Utilisation de l'opérateur null coalescing pour définir une valeur par défaut

            // Récupérer les membres en ordonnant par $orderBy

            $users = User::join('membres', 'users.id', '=', 'membres.user_id')
                ->select('users.*')
                ->orderBy('users.' . $orderBy)
                ->get();

            $data = [
                'users' => $users
            ];
            $pdf = Pdf::loadView('pdf.membres', $data);

            $titre = "recensseement_par_{$orderBy}.pdf";


            return $pdf->download($titre);
        } catch (\Exception $e) {

            // return back()->with(['error' => "{$e->getMessage()} {$e->getLine()}"]);
            // Gérez l'erreur ici, vous pouvez la logger ou retourner une réponse adaptée à l'erreur.
            return back()->with(['error' => 'Une erreur s\'est produite. Veuillez réessayer ou contactez le support technique si le problème persiste']);

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
                   $cotisation->date_cotisation = Carbon::parse(  $cotisation->date_cotisation)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY'); 
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


            return response()->json(['ok' => false, 'message' => $e->getMessage()]);

            return response()->json(['ok' => false, 'message' => 'Une erreur s\'est produite. Veuillez réessayer.']);

        }
    }
}
