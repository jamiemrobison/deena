<?php

use yii\db\Migration;

/**
 * Class m170925_125203_add_prefix_name_to_employee_table
 */
class m170925_125203_add_prefix_name_to_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('employee','prefix_name',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('employee','prefix_name');
    }

   
}
