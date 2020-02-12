<?php

namespace App\Helpers;

use \App\Models\Tbl_log as Mlog;

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

    public static function LogCreateSuccess($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'create',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'success',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }

    public static function LogCreateFail($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'create',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'fail',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }
    public static function LogUpdateSuccess($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'update',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'success',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }

    public static function LogUpdateFail($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'update',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'fail',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }
    public static function LogDeleteSuccess($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'delete',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'success',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }

    public static function LogDeleteFail($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'delete',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'fail',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }
    public static function LogLoginSuccess($model,$data = 'No Data', $user_id, $desc = 'No Description') {
        $data = [
            'job' => 'login',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'success',
            'user_id' => $user_id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }

    public static function LogLoginFail($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'login',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'fail',
            'user_id' => 1,
            'desc' => $desc
        ];

        Mlog::create($data);
    }
    public static function LogLogout($model,$data = 'No Data',$desc = 'No Description') {
        $data = [
            'job' => 'logout',
            'model_target' => $model,
            'data_target' => $data,
            'status' => 'success',
            'user_id' => auth()->user()->id,
            'desc' => $desc
        ];

        Mlog::create($data);
    }
}