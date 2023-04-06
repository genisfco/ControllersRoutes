<?php

namespace App\Http\Controllers;

use DateTime;

class AgeCalculatorController extends Controller
{
    public function calculateAge($ano, $mes = null, $dia = null)
    {
        if (!preg_match('/^\d{4}$/', $ano)) {
            return 'O ano deve ter 4 dígitos.';
        }

        if (($mes && !preg_match('/^\d{1,2}$/', $mes)) || ($mes && ($mes < 1 || $mes > 12))) {
            return 'O mês deve ser um número entre 1 e 12.';
        }

        if (($dia && !preg_match('/^\d{1,2}$/', $dia)) || ($dia && ($dia < 1 || $dia > 31))) {
            return 'O dia deve ser um número entre 1 e 31.';
        }

        if ($mes && $dia && !checkdate($mes, $dia, $ano)) {
            return 'A data informada é inválida.';
        }

        $data = new DateTime("$ano-" . ($mes ?? '01') . "-" . ($dia ?? '01'));
        $hoje = new DateTime();

        if ($data > $hoje) {
            return 'A data informada está no futuro. Informe a data correta.';
        }

        $idade = $hoje->diff($data)->y;

        if ($mes && $dia) {
            return "Você nasceu em $dia/$mes/$ano e tem $idade anos.";
        } elseif ($mes) {
            return "Você nasceu em $mes/$ano e tem $idade anos.";
        } else {
            return "Você nasceu em $ano e tem $idade anos.";
        }
    }
}
