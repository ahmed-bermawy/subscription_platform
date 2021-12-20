<?php

namespace App\Traits;

trait jsonApiTrait
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiResponse($status = 200, $data = null, $message = '', $error = '')
    {
        if ($error !== '') {
            $returnData = [
                'errors' => $error,
                'message' => $message,
            ];
        } else {
            $returnData = [
                'message' => $message,
                'data' => $data
            ];
        }
        return response()->json($returnData, $status);
    }
}
