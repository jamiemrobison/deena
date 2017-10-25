<?php

use yii\db\Migration;

/**
 * Class m170924_010443_alter_disper_column_to_member_level_table
 */
class m170924_010443_alter_disper_column_to_member_level_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('member_level','disc_per',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->alterColumn('member_level','disc_per',$this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_010443_alter_disper_column_to_member_level_table cannot be reverted.\n";

        return false;
    }
    */
}
