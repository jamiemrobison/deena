<?php

namespace backend\helpers;

class PaymentType
{
    const PAYMENT_TYPE_COD = 1;
    const PAYMENT_TYPE_BANK_TRANSFER = 2;
    const PAYMENT_TYPE_BANK_CHEQUE = 3;
    const PAYMENT_TYPE_VISA = 4;
    private static $data = [
        1 => 'เงินสด',
        2 => 'โอนเงิน',
        3 => 'เช็คธนาคาร',
        4 => 'VISA',
        5 => 'ผ่อนเงินสด',
        6 => 'ผ่อนบัตรเครดิต',
        7 => 'ผ่อนสถาบันการเงิน',
    ];

	private static $dataobj = [
        ['id'=>1,'name' => 'เงินสด'],
        ['id'=>2,'name' => 'โอนเงิน'],
        ['id'=>3,'name' => 'เช็คธนาคาร'],
        ['id'=>4,'name' => 'VISA'],
        ['id'=>5,'name' => 'ผ่อนเงินสด'],
        ['id'=>6,'name' => 'ผ่อนบัตรเครดิต'],
        ['id'=>7,'name' => 'ผ่อนสถาบันการเงิน'],
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
