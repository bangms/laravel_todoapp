<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Paginate
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
        // 여기서 요청 처리
        $response = $next($request);

        $data = $response->getDate(true);

        if(isset($data['links'])) {
            unset($data['links']); // links는 빼주세요
        }

        if(isset($data['meta'], $data['meta']['links'])) {
            unset($data['meta']['links']); // meta 안에 links는 빼주세요
        }

        $response-> setData($data);

        return $request;
    }
}
