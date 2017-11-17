<?php

namespace backend\helpers;

class Yesorno
{
    const YES = 1;
    const NO = 0;
    private static $data = [
        0 => 'ไม่มี',
        1 => 'มี'
    ];

	private static $dataobj = [
        ['id'=>0,'name' => 'ไม่มี'],
        ['id'=>1,'name' => 'มี'],
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
    public static function getTypeByName($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
}
