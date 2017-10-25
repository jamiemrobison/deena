<?php

use yii\db\Migration;

/**
 * Class m170924_014040_member_into_id_column_to_member_table
 */
class m170924_014040_member_into_id_column_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('member','member_into_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->addColumn('member','member_into_id',$this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_014040_member_into_id_column_to_member_table cannot be reverted.\n";

        return false;
    }
    */
}
