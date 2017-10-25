<?php

namespace backend\helpers;

class Menuitem
{
    const Menuitem = 1;
    const PARTY_EMPLOYEE = 2;
    private static $data = [
        1 => 'ไม่ระบุ',
        2 => 'ระบุชื่อคนขับ'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ไม่ระบุ'],
        ['id'=>2,'name' => 'ระบุชื่อคนขับ'],
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
