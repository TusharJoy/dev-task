<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UserTableHelper
{
    public function filtering(Request $request, $builder)
    {
        $day = $request->get('day');
        $year = $request->get('year');

        if (!empty($day)) {
            $builder->whereDay('birthday', $day);
        }
        if (!empty($year)) {
            $builder->whereYear('birthday', $year);
        }
        return $builder;
    }
}