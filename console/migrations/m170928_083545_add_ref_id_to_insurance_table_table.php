<?php

use yii\db\Migration;

/**
 * Class m170928_083545_add_ref_id_to_insurance_table_table
 */
class m170928_083545_add_ref_id_to_insurance_table_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','ref_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('insurance_table','ref_id'); 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170928_083545_add_ref_id_to_insurance_table_table cannot be reverted.\n";

        return false;
    }
    */
}
