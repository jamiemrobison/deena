<?php

namespace backend\helpers;

class Party
{
    const PARTY_SHOP = 1;
    const PARTY_EMPLOYEE = 2;
    const PARTY_MEMBER = 3;
    const PARTY_BANK = 4;
    private static $data = [
        1 => 'ร้านค้า',
        2 => 'พนักงาน',
        3 => 'สมาชิก',
        4 => 'ธนาคาร'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'ร้านค้า'],
        ['id'=>2,'name' => 'พนักงาน'],
        ['id'=>3,'name' => 'สมาชิก'],
        ['id'=>4,'name' => 'ธนาคาร'],
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
