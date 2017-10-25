<?php

use yii\db\Migration;

/**
 * Class m171008_080345_add_column_to_insure_table
 */
class m171008_080345_add_column_to_insure_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','payment_method',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('insurance_table','payment_method');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171008_080345_add_column_to_insure_table cannot be reverted.\n";

        return false;
    }
    */
}
