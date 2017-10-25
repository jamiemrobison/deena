<?php

use yii\db\Migration;

/**
 * Class m171013_065019_add_column_to_car_group_company_table
 */
class m171013_065019_add_column_to_car_group_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('car_group_company','insure_company_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('car_group_company','insure_company_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171013_065019_add_column_to_car_group_company_table cannot be reverted.\n";

        return false;
    }
    */
}
