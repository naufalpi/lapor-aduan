<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UpdateUserOnlineStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            // Simpan info bahwa user sedang online (berlaku 5 menit)
            Cache::put('user-is-online-' . $userId, true, now()->addMinutes(5));

            // Simpan waktu terakhir dilihat
            Cache::put('last-seen-' . $userId, now(), now()->addDays(1));
        }

        return $next($request);
    }
}

