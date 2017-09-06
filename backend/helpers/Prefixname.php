<?php

namespace backend\helpers;

class Prefixname
{
    const PREFIX_MR = 1;
    const PREFIX_MS = 2;
    const PREFIX_MISS = 3;
    private static $data = [
        1 => 'นาย',
        2 => 'นางสาว',
        3 => 'นาง'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'นาย'],
        ['id'=>2,'name' => 'นางสาว'],
        ['id'=>3,'name' => 'นาง'],
    ];
    public static function asArray()
    {
        return self::$data;
    }
     public static function asArrayObject()
    {
        return self::$dataobj;
    }
    public static function getTypeById($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
}
