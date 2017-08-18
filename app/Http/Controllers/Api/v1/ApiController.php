<?php

/**
 * Created by PhpStorm.
 * User: Yerman
 * Date: 17.08.2017
 * Time: 18:12
 */

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $response;

    public function sendResponse($status = 200)
    {
        return response()->json($this->response, $status);
    }
}