<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ResetDaily
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $siswaHadir = User::where('username', $request->username)
            ->where('kehadiran', 'sudah')
            ->value('kehadiran');

        if ($siswaHadir == 'sudah') {
            return redirect('/login')->with('notification', 'Anda sudah absen hari ini!');
        }

        return $next($request);
    }
}
