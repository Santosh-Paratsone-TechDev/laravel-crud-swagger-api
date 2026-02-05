<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DebugController extends Controller {
    /**
     * Return authenticated user and request debug info.
     */
    public function info(Request $request) {
        $user = $request->user();

        return response()->json([
            'user' => $user ? $user->only('id', 'name', 'email') : null,
            'method' => $request->method(),
            'path' => $request->path(),
            'authenticated' => $request->user() ? true : false,
        ]);
    }
}
