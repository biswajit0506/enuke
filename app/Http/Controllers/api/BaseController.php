<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * This is the success response method.
     * Handle each response
     *
     */
    public function handleResponse($result, $msg)
    {
    	$res = [
            'success' => true,
            'data'    => $result,
            'message' => $msg,
        ];
        return response()->json($res, 200);
    }


    /**
     * This is the return error response.
     * Handle each error return
     * @return \Illuminate\Http\Response
     */
    public function handleError($error, $errorMsg = [], $code = 404)
    {
    	$res = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMsg)){
            $res['data'] = $errorMsg;
        }
        return response()->json($res, $code);
    }
}
