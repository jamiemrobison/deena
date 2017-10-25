<?php

use yii\db\Migration;

/**
 * Class m171005_145355_add_column_to_insurance_payment_table
 */
class m171005_145355_add_column_to_insurance_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insure_payment','fee',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
          $this->dropColumn('insure_payment','fee');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_145355_add_column_to_insurance_payment_table cannot be reverted.\n";

        return false;
    }
    */
}
