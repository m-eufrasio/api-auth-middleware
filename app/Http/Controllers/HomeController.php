<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Send an HTTP response informing that the user has been redirected to the home page.
     * @param Request $request Include request headers
     * @return Response 301
     */
    public function home(Request $request)
    {
        return response()->json([
            'message' => 'Redirected to home page',
        ], Response::HTTP_MOVED_PERMANENTLY);
    }
}
