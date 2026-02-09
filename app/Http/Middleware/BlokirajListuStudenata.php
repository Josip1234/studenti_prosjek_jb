<?php

namespace App\Http\Middleware;

use App\Models\Students;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlokirajListuStudenata
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $godisteStudenta=Students::selectRaw('godiste')->get();
        $postojiStudent=0;
        foreach ($godisteStudenta as $godina) {
            if($godina['godiste']<1995){
                $postojiStudent=1;
                break;
            }
        }
        if($postojiStudent){
            return response('Postoje studenti stariji od 1995 godine - lista je blokirana',403);
        }
        return $next($request);
    }
}
