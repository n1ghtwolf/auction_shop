<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JsonResponseController extends Controller
{
    public function handle(bool $res, array $data): JsonResponse
    {
        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'data' => $data
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg' => 'fail'
        ]);
    }
}
