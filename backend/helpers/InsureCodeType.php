<?php

namespace backend\helpers;

class InsureCodeType
{
    const TYPE_A = 1;
    const TYPE_B = 2;
    private static $data = [
        1 => 'ภาคบังคับ',
        2 => 'ภาคสมัครใจ'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ภาคบังคับ'],
        ['id'=>2,'name' => 'ภาคสมัครใจ'],
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
