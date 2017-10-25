<?php

use yii\db\Migration;

/**
 * Class m171009_142048_add_column_to_insurance_table
 */
class m171009_142048_add_column_to_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','quotation_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('insurance_table','quotation_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171009_142048_add_column_to_insurance_table cannot be reverted.\n";

        return false;
    }
    */
}
