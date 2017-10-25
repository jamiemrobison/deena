<?php

use yii\db\Migration;

/**
 * Class m170909_121855_add_column_to_insure_payment_table
 */
class m170909_121855_add_column_to_insure_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insure_payment','payment_method',$this->integer());
        $this->addColumn('insure_payment','bank_id',$this->integer());
        $this->addColumn('insure_payment','attachfile',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('insure_payment','payment_method');
       $this->dropColumn('insure_payment','bank_id');
       $this->dropColumn('insure_payment','attachfile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170909_121855_add_column_to_insure_payment_table cannot be reverted.\n";

        return false;
    }
    */
}
