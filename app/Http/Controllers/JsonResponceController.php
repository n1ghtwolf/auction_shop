<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonResponceController extends Controller
{
    public function response(bool $res , array $data){

        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'data'=>$data
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }
}
