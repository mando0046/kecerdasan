<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // ✅ Jika role user tidak sesuai dengan role route
        if ($user->role !== $role) {
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard')
                        ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
                case 'operator':
                    return redirect()->route('operator.dashboard')
                        ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
                case 'peserta':
                    return redirect()->route('peserta.dashboard')
                        ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
                default:
                    return redirect('/')
                        ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        return $next($request);
    }
}
