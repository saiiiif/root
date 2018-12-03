<?php

namespace App\Http\Middleware;

use Closure;

class InstructorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->admin == '1')
        {
            return redirect('/')->with('flash_message_error','You are not authorized');
        }

        return $next($request);
    }
}
