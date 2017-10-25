<?php

use yii\db\Migration;

/**
 * Class m170913_152814_add_column_to_insurance_table
 */
class m170913_152814_add_column_to_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','plate_category',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('insurance_table','plate_category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170913_152814_add_column_to_insurance_table cannot be reverted.\n";

        return false;
    }
    */
}
