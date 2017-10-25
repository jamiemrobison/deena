<?php

use yii\db\Migration;

/**
 * Class m171005_022014_add_column_to_promotion_type_table
 */
class m171005_022014_add_column_to_promotion_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('promotion_type','icon',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('promotion_type','icon');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_022014_add_column_to_promotion_type_table cannot be reverted.\n";

        return false;
    }
    */
}
