<?php

namespace App\Http\Middleware;

use Closure;

class TransformJsonDate
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (method_exists($response, 'getData')) {
        if ($response->getData()) {
            $data = $response->getData(true);
            $response->setData($this->transformDatesInData($data));
        }
        }

        return $response;
    }

    private function transformDatesInData($data)
    {
        if (is_array($data)) {
            return array_map([$this, 'transformDatesInData'], $data);
        }

        return $this->transformDate($data);
    }

    private function transformDate($value)
    {
        $date = $this->createDateFromValue($value);

        if ($date !== null) {
            return $this->formatDate($date);
        }

        return $value;
    }

    private function createDateFromValue($value)
    {
        $date = date_create_from_format('Y-m-d\TH:i:s.u\Z', $value);
        if ($date !== false) {
            return $date;
        }

        return null;
    }

    private function formatDate($date)
    {
        return date_format($date, 'd/m/Y H:i:s');
    }
}
