<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request, $num1, $num2, $operation = null)
    {
        $result = null;

        if ($num2 == 0) {
            return "O segundo número é Zero (0).<br>
            O valor da soma e subtração será igual ao primeiro número: $num1.<br>
            O valor da multiplicação por 0 é sempre: 0.<br>
            E desculpe, não é possível fazer uma divisão por 0.<br>
            Recomendo que escolha outro número.";
        }

        switch ($operation) {
            case 'soma':
                $result = $num1 + $num2;
                break;
            case 'subtracao':
                $result = $num1 - $num2;
                break;
            case 'multiplicacao':
                if ($num2 == 0) {
                    return ' O valor da multiplicação por 0 é sempre: 0.';
                }
                $result = $num1 * $num2;
                break;
            case 'divisao':
                if ($num2 == 0) {
                    return 'Desculpe, não é possível fazer uma divisão por Zero (0).';
                }
                $result = $num1 / $num2;
                break;
            default:
                $results = [
                    'soma' => $num1 + $num2,
                    'subtraçao' => $num1 - $num2,
                    'multiplicação' => $num1 * $num2,
                    'divisão' => $num1 / $num2,
                ];
                break;
        }
        if ($result) {
            return "Resultado da operação $operation: $result";
        } else {
            $resultString = '';
            foreach ($results as $op => $res) {
                $resultString .= "Resultado da operação $op: $res<br>";
            }
            return $resultString;
        }
    }
}
