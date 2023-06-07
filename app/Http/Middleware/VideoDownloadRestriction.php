<?php

namespace App\Http\Middleware;

use Closure;

class VideoDownloadRestriction
{
    public function handle($request, Closure $next)
    {
        abort(403);
        // return response()->json(['message' => 'Access denied.'], 403);
    }
}
