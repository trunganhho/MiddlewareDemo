<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::whereEmail($request->email)->first();

        if($user->role_id == 1){
            return response()->json([
                "data" => "you're an admin"
            ]);
        } else {
            return response()->json([
                "data" => "you're not an admin"
            ]);
        }
        // return $next($request);
    }
}
