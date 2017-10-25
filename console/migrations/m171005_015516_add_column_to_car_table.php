<?php

use yii\db\Migration;

/**
 * Class m171005_015516_add_column_to_car_table
 */
class m171005_015516_add_column_to_car_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('car','type_id',$this->integer());
        $this->addColumn('car','act_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('car','type_id');
       $this->dropColumn('car','act_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171005_015516_add_column_to_car_table cannot be reverted.\n";

        return false;
    }
    */
}
