<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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

}
