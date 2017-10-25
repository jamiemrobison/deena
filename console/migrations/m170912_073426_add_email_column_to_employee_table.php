<?php

use yii\db\Migration;

/**
 * Handles adding email to table `employee`.
 */
class m170912_073426_add_email_column_to_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('employee','email',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('employee','email');
    }
}
