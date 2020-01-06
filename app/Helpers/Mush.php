<?php

namespace App\Helpers;

class Mush {

    public static function getJml($jml) {
        
        $x = (int)$jml;
        if($x % 77 == 0) {
            $ls = $x / 77;
            $bj = 0;
        } else {
            $y = $x;
            $y = $y-($x % 77);
            $ls = $y / 77;
            $bj = $x % 77;
        }

        $res = $ls.' Lengser '.$bj.' Biji';

        return $res;     
    }

    public static function getJmlSat($jml) {
        $x = (int)$jml;
        if($x % 77 == 0) {
            $ls = $x / 77;
            $bj = 0;
        } else {
            $y = $x;
            $y = $y-($x % 77);
            $ls = $y / 77;
            $bj = $x % 77;
        }

        if($bj == 0) {
            return $ls.' Langser';
        } elseif ($ls == 0) {
            return $bj.' Biji'; 
        } else {
            $res = $ls.' Lengser '.$bj.' Biji';
            return $res; 
        }

    }
}