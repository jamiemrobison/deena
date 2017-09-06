<?php

namespace backend\helpers;

class ProtectTitle
{
    const PROTECT_ANOTHER = 1;
    const PREFIX_CAR = 2;
    const PREFIX_PEOPLE = 3;
    private static $data = [
        1 => 'คุ้มครองคู่กรณี',
        2 => 'คุ้มครองรถ',
        3 => 'คุ้มครองผู้โดยสาร'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'คุ้มครองคู่กรณี'],
        ['id'=>2,'name' => 'คุ้มครองรถ'],
        ['id'=>3,'name' => 'คุ้มครองผู้โดยงาน'],
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
