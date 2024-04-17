<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //
    public function membres($orderBy = null)
    {
        try {

            $orderBy = $orderBy === null ? '' : $orderBy;

            $membres = Membre::orderBy($orderBy);

            $pdf = Pdf::loadView('pdf.membres', $membres);

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
            $cotisations = [];
            if ($nature === null) {
                $cotisations = Cotisation::with('nature')->all();

            } else {
                $cotisations = Cotisation::with('nature')->where('nature_id', '=', $nature)->get();

            }

            $nature = $nature === null ? '' : $nature;

            $pdf = Pdf::loadView('pdf.membres', $cotisations);

            $titre = "cotisations_par_{$nature}.pdf";


            return $pdf->download($titre);
        } catch (\Exception $e) {

            // return back()->with(['error' => "{$e->getMessage()} {$e->getLine()}"]);
            // Gérez l'erreur ici, vous pouvez la logger ou retourner une réponse adaptée à l'erreur.
            return back()->with(['error' => 'Une erreur s\'est produite. Veuillez réessayer ou contactez le support technique si le problème persiste']);

        }
    }
}
