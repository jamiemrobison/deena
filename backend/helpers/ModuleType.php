<?php

namespace backend\helpers;

class ModuleType
{
    const MODULE_MENU = 1;
    const MODULE_MENU_ITEM = 2;
    private static $data = [
        1 => 'เมนู',
        2 => 'เมนูย่อย'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'เมนู'],
        ['id'=>2,'name' => 'เมนูย่อย'],
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
