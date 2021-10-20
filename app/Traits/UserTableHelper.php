<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

trait UserTableHelper
{
    public function filtering(Request $request, $builder)
    {
        $day = $request->get('day');
        $year = $request->get('year');

        $keyword = $day . $year;
        if (!empty($keyword)) {
            return Cache::remember($keyword, 60, function () use ($builder, $day, $year, $keyword) {
                Cache::flush();
                return $this->getQueryResult($builder, [
                    'day' => $day,
                    'year' => $year
                ])->get();
            });
        }
        return $this->getQueryResult($builder, [
            'day' => $day,
            'year' => $year
        ]);
    }

    private function getQueryResult($builder, array $properties)
    {
        if (!empty($properties['day'])) {
            $builder->whereDay('birthday', $properties['day']);
        }
        if (!empty($properties['year'])) {
            $builder->whereYear('birthday', $properties['year']);
        }
        return $builder;
    }
}
