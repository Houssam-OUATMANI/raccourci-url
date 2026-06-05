<?php

// *** c'est quoi le chiffrement de cesar
// *** exemple d'implementation PHP / js
// *** pourquoi c'est  de la merde

function cesar(string $str): string
{
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i]  >= 'a' &&  $str[$i] <= 'z') {
            $result .=  $str[$i] <= "m"
                ? chr(ord($str[$i]) + 13)
                : chr(ord($str[$i]) - 13);
        } else if ($str[$i]  >= 'A' &&  $str[$i] <= 'Z') {
            $result .=  $str[$i] <= "M"
                ? chr(ord($str[$i]) + 13)
                : chr(ord($str[$i]) - 13);
        } else {
            $result .= $str[$i];
        }
    }

    return $result;
};



echo cesar("rejna");