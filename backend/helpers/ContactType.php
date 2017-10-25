<?php

namespace backend\helpers;

class ContactType
{
    const TYPE_PHONE = 1;
    const TYPE_MOBILE = 2;
    const TYPE_EMAIL = 3;
    const TYPE_WEBSITE = 4;
    const TYPE_FACEBOOK = 5;
    const TYPE_LINE = 6;
    private static $data = [
        1 => 'โทรศัพท์',
        2 => 'มือถือ',
        3 => 'อีเมล์',
        4 => 'เว็บไซต์',
        5 => 'เฟสบุค',
        6 => 'ไลน์',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'โทรศัพท์'],
        ['id'=>2,'name' => 'มือถือ'],
        ['id'=>3,'name' => 'อีเมล์'],
        ['id'=>4,'name' => 'เว็บไซต์'],
        ['id'=>5,'name' => 'เฟสบุค'],
        ['id'=>6,'name' => 'ไลน์'],
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
