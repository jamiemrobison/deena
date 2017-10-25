<?php

use yii\db\Migration;

/**
 * Class m171006_095122_add_column_to_quotation_table
 */
class m171006_095122_add_column_to_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('quotation','include_act',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('quotation','include_act');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171006_095122_add_column_to_quotation_table cannot be reverted.\n";

        return false;
    }
    */
}
