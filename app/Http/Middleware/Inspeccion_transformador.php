<?php

namespace App\Http\Middleware;

use App\Models\Rep_transformador;
use Closure;
use Illuminate\Http\Request;

class Inspeccion_transformador
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

        $inspeccion = $request->route()->parameters();
        $exists = Rep_transformador::where('inspeccion_id', $inspeccion)->where('status_id', 5)->get();

        if (count($exists) === 1) {
            session()->put('message', 'Esta inspección ya ha sido realizada');
            return \redirect()->route('access');
        }
        return $next($request);
    }
}
