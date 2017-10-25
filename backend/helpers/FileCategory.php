<?php

namespace backend\helpers;

class FileCategory
{
    const TYPE_SLIP = 1;
    const TYPE_ID_CARD = 2;
    const TYPE_DOCUMENT = 3;
    const TYPE_OTHER = 4;

    private static $data = [
        1 => 'ใบเสร็จ',
        2 => 'บัตรประชาชน',
        3 => 'เอกสาร',
        4 => 'อื่นๆ',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ใบเสร็จ'],
        ['id'=>2,'name' => 'บัตรประชาชน'],
        ['id'=>3,'name' => 'เอกสาร'],
        ['id'=>4,'name' => 'อื่นๆ'],
      
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
