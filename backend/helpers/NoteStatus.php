<?php

namespace backend\helpers;

class NoteStatus
{
    const NOTE_STATUS_WAIT = 1;
    const NOTE_STATUS_WAIT_DELIVER = 2;
    const NOTE_STATUS_DELEVER = 3;
   
    private static $data = [
        1 => 'รอบริษัทประกัน',
        2 => 'เอกสารมาแล้ว รอจัดส่ง',
        3 => 'จัดส่งเอกสารแล้ว'
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'รอบริษัทประกัน'],
        ['id'=>2,'name' => 'เอกสารมาแล้ว รอจัดส่ง'],
        ['id'=>3,'name' => 'จัดส่งเอกสารแล้ว'],
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
