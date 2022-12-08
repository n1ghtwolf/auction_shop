<?php

namespace App\Actions;

use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class JsonResponseAction
{
    use AsAction;

    public function __invoke(bool $arg, array $data): JsonResponse
    {
        if ($arg) {
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
