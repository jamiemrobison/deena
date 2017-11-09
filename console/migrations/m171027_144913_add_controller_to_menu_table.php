<?php

use yii\db\Migration;

/**
 * Class m171027_144913_add_controller_to_menu_table
 */
class m171027_144913_add_controller_to_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('menu','controller',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('menu','controller');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171027_144913_add_controller_to_menu_table cannot be reverted.\n";

        return false;
    }
    */
}
