<?php

namespace App\Http\Middleware;


use Closure;
use App\Category;

class checkCategory
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
        $categroy = Category::all()->count();

        if ($categroy == 0) {
            session()->flash("error" , "First you need add some categories ..");
            return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
