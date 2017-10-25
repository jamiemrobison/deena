<?php

use yii\db\Migration;

/**
 * Class m171008_133345_add_column_to_payment_channel_table
 */
class m171008_133345_add_column_to_payment_channel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('payment_channel','type_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('payment_channel','type_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171008_133345_add_column_to_payment_channel_table cannot be reverted.\n";

        return false;
    }
    */
}
