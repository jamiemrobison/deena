<?php

namespace backend\helpers;

class Servicetype
{
    const SERVICE_TYPE_ONE = 1;
    const SERVICE_TYPE_TWO = 2;
    private static $data = [
        1 => 'ซ่อมอู่',
        2 => 'ซ่อมห้าง',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ซ่อมอู่'],
        ['id'=>2,'name' => 'ซ่อมห้าง'],
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
