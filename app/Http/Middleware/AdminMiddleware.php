<--?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {

            if(Auth::user()->role == '1'){
                return $next($request);
            } else {
                return redirect('/home')->with('message', 'Kamu tidak diperbolehkan mengakses ini!');
            }

        } else {
            
            return redirect('/');
        
        }
        return redirect('/');
        
    }
}
