<?php

namespace App\Helpers;

class Helper
{
    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();

        $data = $model::orderBy('id', 'desc')->first();
        $last_number = 1;

        if ($data) {
            $code = (int)substr($data->$trow, strlen($prefix) + 1);
            $last_number = $code + 1;
        }

        $og_length = $length - strlen($last_number);
        $zeros = str_repeat("0", $og_length);

        return  $zeros . $last_number . '-'. $prefix;
    }
}
