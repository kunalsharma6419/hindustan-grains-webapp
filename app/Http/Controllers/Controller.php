<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function numberToWords($number)
    {
        $ones = array(
            1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
            15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen'
        );
        $tens = array(
            2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty',
            6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'
        );

        $words = array();
        if ($number < 0) {
            $words[] = 'minus';
            $number = abs($number);
        }

        if ($number < 20) {
            $words[] = $ones[$number];
        } elseif ($number < 100) {
            $words[] = $tens[($number / 10)];
            if ($number % 10) {
                $words[] = $ones[$number % 10];
            }
        } elseif ($number < 1000) {
            $words[] = $ones[($number / 100)] . ' hundred';
            if ($number % 100) {
                $words[] = $this->numberToWords($number % 100);
            }
        } else {
            $baseUnit = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion');
            $base = pow(1000, floor(log($number, 1000)));
            $unit = $number / $base;
            $words[] = $this->numberToWords($unit) . ' ' . $baseUnit[floor(log($number, 1000))];
            if ($number % $base) {
                $words[] = $this->numberToWords($number % $base);
            }
        }

        return implode(' ', $words);
    }

}
