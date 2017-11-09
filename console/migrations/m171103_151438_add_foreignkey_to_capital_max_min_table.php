<?php

use yii\db\Migration;

/**
 * Class m171103_151438_add_foreignkey_to_capital_max_min_table
 */
class m171103_151438_add_foreignkey_to_capital_max_min_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->addForeignKey('fk_capital_car','capital_max','capital_car_id','capital_car','id','CASCADE','CASCADE');
         $this->addForeignKey('fk_capital_car','capital_min','capital_car_id','capital_car','id','CASCADE','CASCADE');
         $this->addForeignKey('fk_cap_year','capital_car','cap_year_id','capital_year','id','CASCADE','CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
         $this->dropForeignKey('capital_car_id','capital_max');
         $this->dropForeignKey('capital_car_id','capital_min');
         $this->dropForeignKey('cap_year_id','capital_year');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171103_151438_add_foreignkey_to_capital_max_min_table cannot be reverted.\n";

        return false;
    }
    */
}
