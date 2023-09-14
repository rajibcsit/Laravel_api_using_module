<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function fail($message, $status = 'fail', $status_code = 400)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
        ], $status_code);
    }

    public function success($data, $status = 'success', $status_code = 200)
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
        ], $status_code);
    }
}
