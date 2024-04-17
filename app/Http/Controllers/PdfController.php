<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membre;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    //
    public function membres($orderBy = null)
    {
        // try {

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
        // } catch (\Exception $e) {

        //     // return back()->with(['error' => "{$e->getMessage()} {$e->getLine()}"]);
        //     // Gérez l'erreur ici, vous pouvez la logger ou retourner une réponse adaptée à l'erreur.
        //     return back()->with(['error' => 'Une erreur s\'est produite. Veuillez réessayer ou contactez le support technique si le problème persiste']);

        // }
    }
    public function cotisations($nature = null)
    {
        try {
            $cotisations = [];
            if ($nature === null) {
                $cotisations = Cotisation::with('nature')->all();

            } else {
                $cotisations = Cotisation::with('nature')->where('nature_id', '=', $nature)->get();

            }

            $nature = $nature === null ? '' : $nature;

            $pdf = Pdf::loadView('pdf.membres', $cotisations);

            $titre = "cotisations_par_{$nature}.pdf";

            //127.0.0.1:8000/download/pdf/membres
            return $pdf->download($titre);
        } catch (\Exception $e) {

            // return back()->with(['error' => "{$e->getMessage()} {$e->getLine()}"]);
            // Gérez l'erreur ici, vous pouvez la logger ou retourner une réponse adaptée à l'erreur.
            return back()->with(['error' => 'Une erreur s\'est produite. Veuillez réessayer ou contactez le support technique si le problème persiste']);

        }
    }
}
