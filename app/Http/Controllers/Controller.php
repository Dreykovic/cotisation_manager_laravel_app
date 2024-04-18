<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function formatMontant($text)
    {
        $text = trim($text);
        $text = strrev($text);
        $length = strlen($text);
        $newText = '';

        for ($i = 0; $i < $length; $i++) {
            if (($i + 1) % 3 === 1 && $i != 1) {
                $newText .= ' ';
            }
            $newText .= $text[$i];
        }

        $newText = strrev($newText);

        return $newText . ' FCFA';
    }
    public function isAdult($birthdate)
    {
        // Récupération de la date de naissance de l'utilisateur
        // $birthday = Carbon::createFromFormat('Y-m-d', );
        $birthday=  Carbon::parse($birthdate);

        // Création de la date actuelle
        $currentDate = Carbon::now();

        // Calcul de l'âge de l'utilisateur
        $age = $birthday->diffInYears($currentDate);

        // Vérification si l'utilisateur a 18 ans ou plus
        return $age >= 18;
    }

}
