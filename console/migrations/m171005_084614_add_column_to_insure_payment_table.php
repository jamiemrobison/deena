<?php

use yii\db\Migration;

/**
 * Class m171005_084614_add_column_to_insure_payment_table
 */
class m171005_084614_add_column_to_insure_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insure_payment','payment_code',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('insure_payment','payment_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_084614_add_column_to_insure_payment_table cannot be reverted.\n";

        return false;
    }
    */
}
