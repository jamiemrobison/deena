<?php

use yii\db\Migration;

/**
 * Class m170903_151241_add_account_type_to_bank_account_table
 */
class m170903_151241_add_account_type_to_bank_account_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('bank_account','account_type',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('bank_account','account_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170903_151241_add_account_type_to_bank_account_table cannot be reverted.\n";

        return false;
    }
    */
}
