<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

final class WriterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json();
    }
}
