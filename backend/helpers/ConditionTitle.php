<?php

namespace backend\helpers;

class ConditionTitle
{
    const CONDITION_YEAR = 1;
    const CONDITION_PHOTO = 2;
    const CONDITION_EXTRA = 3;
    const CONDITION_OTHER = 4;
    private static $data = [
        1 => 'อายุรถ',
        2 => 'รูปถ่าย',
        3 => 'บริการเสริม',
        3 => 'ความคุ้มครองอื่น'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'อายุรถ'],
        ['id'=>2,'name' => 'รูปถ่าย'],
        ['id'=>3,'name' => 'บริการเสริม'],
        ['id'=>4,'name' => 'ความคุ้มครองอื่น'],
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
