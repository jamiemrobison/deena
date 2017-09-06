<?php

namespace backend\helpers;

class BankAccountType
{
    const ACCOUNT_SAVING = 1;
    const ACCOUNT_CURRENT = 2;
    private static $data = [
        1 => 'ออมทรัพย์',
        2 => 'กระแสรายวัน'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ออมทรัพย์'],
        ['id'=>2,'name' => 'กระแสรายวัน'],
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
