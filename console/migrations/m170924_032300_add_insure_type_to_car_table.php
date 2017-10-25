<?php

use yii\db\Migration;

/**
 * Class m170924_032300_add_insure_type_to_car_table
 */
class m170924_032300_add_insure_type_to_car_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('car','insure_type',$this->integer());

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('car','insure_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_032300_add_insure_type_to_car_table cannot be reverted.\n";

        return false;
    }
    */
}
