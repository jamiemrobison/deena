<?php

use yii\db\Migration;

/**
 * Class m171008_120126_add_column_to_payment_channel_table
 */
class m171008_120126_add_column_to_payment_channel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('payment_channel','is_bank_transfer',$this->integer());
        $this->addColumn('payment_channel','is_cash',$this->integer());
        $this->addColumn('payment_channel','is_credit',$this->integer());
        $this->addColumn('payment_channel','is_installment',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('payment_channel','is_bank_transfer');
        $this->dropColumn('payment_channel','is_cash');
        $this->dropColumn('payment_channel','is_credit');
        $this->dropColumn('payment_channel','is_installment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171008_120126_add_column_to_payment_channel_table cannot be reverted.\n";

        return false;
    }
    */
}
