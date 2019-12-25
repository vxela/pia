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
        // return array(
        //         'jml_ls' => $ls,
        //         'jml_bj' => $bj
        //     );            
    }
}