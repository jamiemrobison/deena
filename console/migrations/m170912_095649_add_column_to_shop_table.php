<?php

use yii\db\Migration;

/**
 * Class m170912_095649_add_column_to_shop_table
 */
class m170912_095649_add_column_to_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('shop','email_for_insure',$this->string());
        $this->addColumn('shop','email_for_member',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('shop','email_for_insure');
       $this->dropColumn('shop','email_for_member');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170912_095649_add_column_to_shop_table cannot be reverted.\n";

        return false;
    }
    */
}
