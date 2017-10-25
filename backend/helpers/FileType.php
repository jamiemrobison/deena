<?php

namespace backend\helpers;

class FileType
{
    const TYPE_TEXT = 1;
    const TYPE_PDF = 2;
    const TYPE_IMAGE = 3;

    private static $data = [
        1 => 'Text',
        2 => 'Pdf',
        3 => 'Image',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'Text'],
        ['id'=>2,'name' => 'Pdf'],
        ['id'=>3,'name' => 'Image'],
      
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
