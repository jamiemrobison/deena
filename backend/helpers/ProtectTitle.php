<?php

namespace backend\helpers;

class ProtectTitle
{
    const PROTECT_ANOTHER = 1;
    const PREFIX_CAR = 2;
    const PREFIX_PEOPLE = 3;
    private static $data = [
        1 => 'ความคุ้มครองบุคคลภายนอก',
        2 => 'ความคุ้มครองตัวรถที่เอาประกัน',
        3 => 'ความคุ้มครองคนในรถ'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ความคุ้มครองบุคคลภายนอก'],
        ['id'=>2,'name' => 'ความคุ้มครองตัวรถที่เอาประกัน'],
        ['id'=>3,'name' => 'ความคุ้มครองคนในรถ'],
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
