<?php

namespace backend\helpers;

class TitleName
{
	const TITLE_NAME_MR = 0;
    const TITLE_NAME_MS = 1;
    const TITLE_NAME_MISS = 2;
    private static $data = [
        0 => 'นาย',
        1 => 'นางสาว',
        2 => 'นาง'
    ];

    public static function asArray()
    {
        return self::$data;
    }

    public static function getTypeById($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
}
