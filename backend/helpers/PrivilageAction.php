<?php

namespace backend\helpers;

class PrivilageAction
{
	const PRIVILAGE_VIEW = 0;
    const PRIVILAGE_INSERT = 1;
    const PRIVILAGE_UPDATE = 2;
    const PRIVILAGE_DELETE = 3;
    private static $data = [
        0 => 'View',
        1 => 'Insert',
        2 => 'Update',
        3 => 'Delete'
    ];

    public static function asArray()
    {
        return self::$data;
    }

    public static function getTypeById($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
}
