<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BearerTokenAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get Bearer token from Authorization header
        $authHeader = $request->header('Authorization');
        
        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['message' => 'Missing or invalid Authorization header'], 401);
        }

        $token = substr($authHeader, 7); // Remove "Bearer " prefix

        // Token format: {id}|{secret}
        if (!str_contains($token, '|')) {
            return response()->json(['message' => 'Invalid token format'], 401);
        }

        [$tokenId, $tokenSecret] = explode('|', $token, 2);

        // Look up token by ID (not hashed)
        $tokenRecord = DB::table('personal_access_tokens')
            ->where('id', $tokenId)
            ->first();

        if (!$tokenRecord) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // Verify the secret hash matches
        if ($tokenRecord->token !== hash('sha256', $tokenSecret)) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // Check if token is expired
        if ($tokenRecord->expires_at && now()->isAfter($tokenRecord->expires_at)) {
            return response()->json(['message' => 'Token expired'], 401);
        }

        // Load the user
        $user = User::find($tokenRecord->tokenable_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        // Set the user on the request
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}
