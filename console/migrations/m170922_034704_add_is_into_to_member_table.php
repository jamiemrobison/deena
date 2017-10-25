<?php

use yii\db\Migration;

/**
 * Class m170922_034704_add_is_into_to_member_table
 */
class m170922_034704_add_is_into_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('member','is_into',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('member','is_into');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170922_034704_add_is_into_to_member_table cannot be reverted.\n";

        return false;
    }
    */
}
