<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class TransformJsonResponse
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!$response instanceof JsonResponse) {
            return $response;
        }

        $data = $response->getData(true);
        $response->setData($this->transformKeys($data));

        return $response;
    }

    private function transformKeys($data)
    {
        if (!is_array($data)) {
            return $data;
        }

        return collect($data)->mapWithKeys(function ($item, $key) {
            return [Str::camel($key) => is_array($item) ? $this->transformKeys($item) : $item];
        })->all();
    }
}
