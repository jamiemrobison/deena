<?php

namespace backend\helpers;

class Permission
{
    const PERMISSION_FULL = 1;
    const PERMISSION_VIEW = 2;
    const PERMISSION_DELETE = 3;
    const PERMISSION_UPDATE = 4;
    const PERMISSION_APPROVE = 5;
    private static $data = [
        1 => 'Full Control',
        2 => 'View',
        3 => 'Delete',
        4 => 'Update',
        5 => 'Approve'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'Full Control'],
        ['id'=>2,'name' => 'View'],
        ['id'=>3,'name' => 'Delete'],
        ['id'=>4,'name' => 'Update'],
        ['id'=>5,'name' => 'Approve'],
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