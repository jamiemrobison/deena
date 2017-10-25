<?php

use yii\db\Migration;

/**
 * Class m171005_161340_add_column_to_installment_table
 */
class m171005_161340_add_column_to_installment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('installment','insure_no',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('installment','insure_no');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_161340_add_column_to_installment_table cannot be reverted.\n";

        return false;
    }
    */
}
