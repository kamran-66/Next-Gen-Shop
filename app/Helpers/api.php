<?php

function success($data, $message = 'Success')
{
    return response()->json([
        'status' => true,
        'message' => $message,
        'data' => $data
    ]);
}