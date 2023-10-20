<?php

namespace App\Helpers;

class Helper
{
    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();

        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            $code = (int)substr($data->$trow, strlen($prefix) + 1); // Cast to integer
            $actual_last_number = $code;
            $increment_last_number = $actual_last_number + 1;

            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }

        $zeros = str_repeat("0", $og_length);

        return  $zeros . $last_number . '-'. $prefix;
    }
}
