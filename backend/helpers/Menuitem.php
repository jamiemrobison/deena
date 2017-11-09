<?php

namespace backend\helpers;

class Menuitem
{
    const MENU_DASHBOARD = 1;
    const MENU_SHOP = 2;
    const MENU_SYSTEM_COG = 3;
    const MENU_USER = 4;
    const MENU_ACCOUNT = 5;
    const MENU_CAR = 6;
    const MENU_ACCOUNT = 7;
    const MENU_ACCOUNT = 8;
    const MENU_ACCOUNT = 9;
    const MENU_ACCOUNT = 9;
    
    private static $data = [
        1 => 'Dashboard',
        2 => 'ตั้งค่าร้าน',
        3 => 'ตั้งค่าระบบ',
        4 => 'ผู้ใช้งาน',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'Dashboard'],
        ['id'=>2,'name' => 'ตั้งค่าร้าน'],
        ['id'=>3,'name' => 'ตั้งค่าระบบ'],
        ['id'=>4,'name' => 'ผู้ใช้งาน'],
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
