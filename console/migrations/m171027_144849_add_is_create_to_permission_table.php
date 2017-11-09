<?php

use yii\db\Migration;

/**
 * Class m171027_144849_add_is_create_to_permission_table
 */
class m171027_144849_add_is_create_to_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
      $this->addColumn('permission','is_create',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('permission','is_create');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171027_144849_add_is_create_to_permission_table cannot be reverted.\n";

        return false;
    }
    */
}
