<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return response()->json([
            'message' => 'Redirecionado para a "home page"',
            'headers' => $request->headers->all(),
        ], Response::HTTP_MOVED_PERMANENTLY);
    }
}
